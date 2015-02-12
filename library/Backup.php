<?php
/**
 * Created by PhpStorm.
 * User: coxa
 * Date: 12.02.15
 * Time: 23:47
 */

namespace app\library;

use Symfony\Component\Filesystem\Filesystem;
use Yii;

class Backup
{
    public $menu = [];
    public $tables = [];
    public $fp;
    /**
     * @var Filesystem
     */
    public $fs;
    public $file_name;
    public $path = null;
    public $back_temp_file = 'db_backup_';

    public function __construct()
    {
        $this->fs = new Filesystem();
        $this->getPath();
    }

    /**
     * @return string full path to folder
     */
    protected function getPath()
    {
        if (is_null($this->path)) {
            $this->path = Yii::$app->basePath . '/_backup/';
        }
        if (!$this->fs->exists($this->path)) {
            $this->fs->mkdir($this->path);
        }
        return $this->path;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function backupBd()
    {
        $tables = $this->getTables();
        if (!$this->startBackup()) {
            //render error
            throw new \Exception('File backup can not be open to write');
        }
        foreach ($tables as $tableName) {
            $this->getColumns($tableName);
        }
        foreach ($tables as $tableName) {
            $this->getData($tableName);
        }
        $this->endBackup();

        $tarFile = $this->file_name . '.tar.gz';
        if ($this->tarGz($this->file_name, $tarFile)) {
            $this->fs->remove($this->file_name);
            return $tarFile;
        }
        return $this->file_name;
    }

    public function backupImages()
    {
        $imgFolderPath = Yii::$app->basePath . '/web/images';
        $filename = $this->path . 'images_' . date('Y.m.d_H.i.s') . '.tar.gz';
        if ($this->fs->exists($imgFolderPath)) {
            return $this->tarGz($imgFolderPath, $filename);
        }
        return false;
    }

    private function tarGz($file_input, $file_output)
    {
        $command = 'tar -zcvf ' . $file_output . ' ' . $file_input;
        shell_exec($command);
        return $this->fs->exists($file_output);
    }

    /**
     * @param $sqlFile string file path
     * @return string
     */
    public function execSqlFile($sqlFile)
    {
        $message = "ok";
        if (file_exists($sqlFile)) {
            $sqlArray = file_get_contents($sqlFile);
            $cmd = Yii::$app->db->createCommand($sqlArray);
            try {
                $cmd->execute();
            } catch (\yii\db\Exception $e) {
                $message = $e->getMessage();
            }
        }
        return $message;
    }

    public function getColumns($tableName)
    {
        $sql = 'SHOW CREATE TABLE ' . $tableName;
        $cmd = Yii::$app->db->createCommand($sql);
        $table = $cmd->queryOne();
        $create_query = $table['Create Table'] . ';';
        $create_query = preg_replace('/^CREATE TABLE/', 'CREATE TABLE IF NOT EXISTS', $create_query);
        $create_query = preg_replace('/AUTO_INCREMENT\s*=\s*([0-9])+/', '', $create_query);
        if ($this->fp) {
            $this->writeComment('TABLE `' . addslashes($tableName) . '`');
            $final = 'DROP TABLE IF EXISTS `' . addslashes($tableName) . '`;' . PHP_EOL . $create_query . PHP_EOL . PHP_EOL;
            fwrite($this->fp, $final);
        } else {
            $this->tables[$tableName]['create'] = $create_query;
            return $create_query;
        }
    }

    public function getData($tableName)
    {
        $sql = 'SELECT * FROM ' . $tableName;
        $cmd = Yii::$app->db->createCommand($sql);
        $dataReader = $cmd->query();
        $data_string = '';
        foreach ($dataReader as $data) {
            $itemNames = array_keys($data);
            $itemNames = array_map("addslashes", $itemNames);
            $items = join('`,`', $itemNames);
            $itemValues = array_values($data);
            $itemValues = array_map("addslashes", $itemValues);
            $valueString = join("','", $itemValues);
            $valueString = "('" . $valueString . "'),";
            $values = "\n" . $valueString;
            if ($values != "") {
                $data_string .= "INSERT INTO `$tableName` (`$items`) VALUES" . rtrim($values, ",") . ";;;" . PHP_EOL;
            }
        }
        if ($data_string == '') {
            return null;
        }
        if ($this->fp) {
            $this->writeComment('TABLE DATA ' . $tableName);
            $final = $data_string . PHP_EOL . PHP_EOL . PHP_EOL;
            fwrite($this->fp, $final);
        } else {
            $this->tables[$tableName]['data'] = $data_string;
            return $data_string;
        }
    }

    public function getTables($dbName = null)
    {
        $sql = 'SHOW TABLES';
        $cmd = Yii::$app->db->createCommand($sql);
        $tables = $cmd->queryColumn();
        return $tables;
    }

    public function startBackup($addCheck = true)
    {
        $this->file_name = $this->path . $this->back_temp_file . date('Y.m.d_H.i.s') . '.sql';
        $this->fp = fopen($this->file_name, 'w+');
        if ($this->fp == null) {
            return false;
        }
        fwrite($this->fp, '-- -------------------------------------------' . PHP_EOL);
        if ($addCheck) {
            fwrite($this->fp, 'SET AUTOCOMMIT=0;' . PHP_EOL);
            fwrite($this->fp, 'START TRANSACTION;' . PHP_EOL);
            fwrite($this->fp, 'SET SQL_QUOTE_SHOW_CREATE = 1;' . PHP_EOL);
        }
        fwrite($this->fp, 'SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;' . PHP_EOL);
        fwrite($this->fp, 'SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;' . PHP_EOL);
        fwrite($this->fp, '-- -------------------------------------------' . PHP_EOL);
        $this->writeComment('START BACKUP');
        return true;
    }

    public function endBackup($addCheck = true)
    {
        fwrite($this->fp, '-- -------------------------------------------' . PHP_EOL);
        fwrite($this->fp, 'SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;' . PHP_EOL);
        fwrite($this->fp, 'SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;' . PHP_EOL);
        if ($addCheck) {
            fwrite($this->fp, 'COMMIT;' . PHP_EOL);
        }
        fwrite($this->fp, '-- -------------------------------------------' . PHP_EOL);
        $this->writeComment('END BACKUP');
        fclose($this->fp);
        $this->fp = null;
    }

    public function writeComment($string)
    {
        fwrite($this->fp, '-- -------------------------------------------' . PHP_EOL);
        fwrite($this->fp, '-- ' . $string . PHP_EOL);
        fwrite($this->fp, '-- -------------------------------------------' . PHP_EOL);
    }

//    public function actionCreate()
//    {
//        $tables = $this->getTables();
//        if (!$this->startBackup()) {
//            //render error
//            Yii::$app->user->setFlash('success', "Error");
//            return $this->render('index');
//        }
//        foreach ($tables as $tableName) {
//            $this->getColumns($tableName);
//        }
//        foreach ($tables as $tableName) {
//            $this->getData($tableName);
//        }
//        $this->endBackup();
//        $this->redirect(['index']);
//    }
//
//    public function actionClean($redirect = true)
//    {
//        $ignore = ['tbl_user', 'tbl_user_role', 'tbl_event'];
//        $tables = $this->getTables();
//        if (!$this->startBackup()) {
//            //render error
//            Yii::$app->user->setFlash('success', "Error");
//            return $this->render('index');
//        }
//        $message = '';
//        foreach ($tables as $tableName) {
//            if (in_array($tableName, $ignore)) {
//                continue;
//            }
//            fwrite($this->fp, '-- -------------------------------------------' . PHP_EOL);
//            fwrite($this->fp, 'DROP TABLE IF EXISTS ' . addslashes($tableName) . ';' . PHP_EOL);
//            fwrite($this->fp, '-- -------------------------------------------' . PHP_EOL);
//            $message .= $tableName . ',';
//        }
//        $this->endBackup();
//        // logout so there is no problme later .
//        Yii::$app->user->logout();
//        $this->execSqlFile($this->file_name);
//        unlink($this->file_name);
//        $message .= ' are deleted.';
//        Yii::$app->session->setFlash('success', $message);
//        return $this->redirect(['index']);
//    }
//
//    public function actionDelete($file = null)
//    {
//        $this->updateMenuItems();
//        if (isset($file)) {
//            $sqlFile = $this->path . basename($file);
//            if (file_exists($sqlFile)) {
//                unlink($sqlFile);
//            }
//        } else {
//            throw new CHttpException(404, Yii::t('app', 'File not found'));
//        }
//        $this->actionIndex();
//    }
//
//    public function actionDownload($file = null)
//    {
//        $this->updateMenuItems();
//        if (isset($file)) {
//            $sqlFile = $this->path . basename($file);
//            if (file_exists($sqlFile)) {
//                $request = Yii::$app->getRequest();
//                $request->sendFile(basename($sqlFile), file_get_contents($sqlFile));
//            }
//        }
//        throw new CHttpException(404, Yii::t('app', 'File not found'));
//    }
//
//    public function actionIndex()
//    {
//        //$this->layout = 'column1';
//        $this->updateMenuItems();
//        $path = $this->path;
//        $dataArray = [];
//        $list_files = glob($path . '*.sql');
//        if ($list_files) {
//            $list = array_map('basename', $list_files);
//            sort($list);
//            foreach ($list as $id => $filename) {
//                $columns = [];
//                $columns['id'] = $id;
//                $columns['name'] = basename($filename);
//                $columns['size'] = filesize($path . $filename);
//                $columns['create_time'] = date('Y-m-d H:i:s', filectime($path . $filename));
//                $columns['modified_time'] = date('Y-m-d H:i:s', filemtime($path . $filename));
//                $dataArray[] = $columns;
//            }
//        }
//        $dataProvider = new ArrayDataProvider(['allModels' => $dataArray]);
//        return $this->render('index', [
//            'dataProvider' => $dataProvider,
//        ]);
//    }
//
//    public function actionSyncdown()
//    {
//        $tables = $this->getTables();
//        if (!$this->startBackup()) {
//            //render error
//            return $this->render('index');
//        }
//        foreach ($tables as $tableName) {
//            $this->getColumns($tableName);
//        }
//        foreach ($tables as $tableName) {
//            $this->getData($tableName);
//        }
//        $this->endBackup();
//        return $this->actionDownload(basename($this->file_name));
//    }
//
//    public function actionRestore($file = null)
//    {
//        $this->updateMenuItems();
//        $message = 'OK. Done';
//        $sqlFile = $this->path . 'install.sql';
//        if (isset($file)) {
//            $sqlFile = $this->path . basename($file);
//        }
//        $this->execSqlFile($sqlFile);
//        return $this->render('restore',['error' => $message]);
//    }
//
//    public function actionUpload()
//    {
//        $model = new UploadForm();
//        if (isset($_POST['UploadForm'])) {
//            $model->attributes = $_POST['UploadForm'];
//            $model->upload_file = CUploadedFile::getInstance($model, 'upload_file');
//            if ($model->upload_file->saveAs($this->path . $model->upload_file)) {
//                // redirect to success page
//                return $this->redirect(['index']);
//            }
//        }
//        return $this->render('upload', array('model' => $model));
//    }
//
//    protected function updateMenuItems($model = null)
//    {
//        // create static model if model is null
//        if ($model == null) {
//            $model = new UploadForm();
//        }
//        switch ($this->action->id) {
//            case 'restore': {
//                $this->menu[] = ['label' => Yii::t('app', 'View Site'), 'url' => Yii::$app->HomeUrl];
//            }
//            case 'create': {
//                $this->menu[] = ['label' => Yii::t('app', 'List Backup'), 'url' => ['index']];
//            }
//                break;
//            case 'upload': {
//                $this->menu[] = ['label' => Yii::t('app', 'Create Backup'), 'url' => ['create']];
//            }
//                break;
//            default: {
//                $this->menu[] = ['label' => Yii::t('app', 'List Backup'), 'url' => ['index']];
//                $this->menu[] = ['label' => Yii::t('app', 'Create Backup'), 'url' => ['create']];
//                $this->menu[] = ['label' => Yii::t('app', 'Upload Backup'), 'url' => ['upload']];
//                $this->menu[] = ['label' => Yii::t('app', 'Restore Backup'), 'url' => ['restore']];
//                $this->menu[] = ['label' => Yii::t('app', 'Clean Database'), 'url' => ['clean']];
//                $this->menu[] = ['label' => Yii::t('app', 'View Site'), 'url' => Yii::$app->HomeUrl];
//            }
//                break;
//        }
//    }
}
