<?php
/**
 * Created by PhpStorm.
 * User: coxa
 * Date: 25.01.15
 * Time: 20:50
 */

namespace app\library;


use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Filesystem\Filesystem;
use Yii;
use yii\base\Behavior;
use yii\base\InvalidParamException;
use yii\base\ModelEvent;
use yii\db\ActiveRecord;
use yii\db\AfterSaveEvent;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class PhotoBehavior extends Behavior
{
    public $attribute = 'file';

    public $urlPart = '/images/';
    public $unlinkOnSave = true;
    public $unlinkOnDelete = true;

    private $_uploadPath = '';
    private $_baseUploadPath = '';
    private $_urlPath = '';
    private $_file = null;
    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * Events declaration
     * @return array
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeSave',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeSave',
            ActiveRecord::EVENT_AFTER_INSERT => 'afterSave',
            ActiveRecord::EVENT_AFTER_UPDATE => 'afterSave',
            ActiveRecord::EVENT_BEFORE_DELETE => 'beforeDelete'
        ];
    }

    /**
     * This method is invoked before validation starts.
     */
    public function beforeValidate()
    {
        /** @var ActiveRecord $model */
        $model = $this->owner;
        $a = $this->attribute;
        if ($model->$a instanceof UploadedFile) {
            $this->_file = $model->$a;
        } else {
            $this->_file = UploadedFile::getInstance($model, $this->attribute);
        }
        if ($this->_file instanceof UploadedFile) {
            $this->_file->name = $this->generateFileName($this->_file);
            $model->setAttribute($this->attribute, $this->_urlPath . $this->_file);
        }
    }

    /**
     * Generates random filename.
     * @param UploadedFile $file
     * @return string
     */
    protected function generateFileName($file)
    {
        $extension = '.' . $file->extension;
        $hash = md5(uniqid() . '_' . $file->getBaseName() . '_' . time());
        $parts = [];
        for ($i = 0; $i < 3; $i++) {
            $parts[] = substr($hash, 0, 3);
            $hash = substr_replace($hash, '', 0, 3);
        }
        $this->_urlPath =  DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $parts);
        $this->_uploadPath = $this->_baseUploadPath . $this->_urlPath;
        $filename = $hash . $extension;
        unset($hash);

        return $filename;
    }

    public function afterSave(AfterSaveEvent $event)
    {
        if ($this->_file instanceof UploadedFile) {
            $path = $this->getUploadPath($this->attribute);
            if (!FileHelper::createDirectory(dirname($path))) {
                throw new InvalidParamException("Directory specified in 'path' attribute doesn't exist or cannot be created.");
            }
            $this->_file->saveAs($path);
        }
    }

    public function beforeSave(ModelEvent $event)
    {
        /** @var ActiveRecord $model */
        $model = $this->owner;

        if ($this->_file instanceof UploadedFile) {
            if (!$model->getIsNewRecord() && $model->isAttributeChanged($this->attribute)) {
                if ($this->unlinkOnSave === true) {
                    $this->delete($this->attribute, true);
                }
            }
            $model->setAttribute($this->attribute, $this->_urlPath . $this->_file->name);
        }
    }

    /**
     * Deletes old file.
     * @param string $attribute
     * @param boolean $old
     */
    protected function delete($attribute, $old = false)
    {
        $path = $this->getUploadPath($attribute, $old);
        if ($this->filesystem->exists($path)) {
            $this->filesystem->remove($path);
        }
    }

    /**
     * Returns file path for the attribute.
     *
     * @param string $attribute
     * @param boolean $old
     *
     * @return string the file path.
     */
    public function getUploadPath($attribute, $old = false)
    {
        /** @var ActiveRecord $model */
        $model = $this->owner;

        if ($old) {
            $x = $model->getOldAttribute($attribute);
            $path = $this->resolvePath($this->_baseUploadPath . $x);
        } else {
            $x = $model->$attribute;
            $path = $this->resolvePath($this->_baseUploadPath . $x);
        }

        return $path;
    }

    /**
     * Replaces all placeholders in path variable with corresponding values.
     */
    protected function resolvePath($path)
    {
        /** @var ActiveRecord $model */
        $model = $this->owner;
        return preg_replace_callback('/{([^}]+)}/', function ($matches) use ($model) {
            $name = $matches[1];
            $attribute = $model->getAttribute($name);
            if (is_string($attribute) || is_numeric($attribute)) {
                return $attribute;
            } else {
                return $matches[0];
            }
        }, $path);
    }

    public function init()
    {
        parent::init();
        $this->_baseUploadPath = \Yii::$app->basePath .
            DIRECTORY_SEPARATOR . 'web';
        $this->filesystem = new Filesystem();
    }

    /**
     * This method is invoked before deleting a record.
     */
    public function beforeDelete()
    {
        $attribute = $this->attribute;
        if ($this->unlinkOnDelete && $attribute) {
            $this->delete($attribute);
        }
    }

    public function setFile(UploadedFile $uploadedFile) {
        $this->_file = $uploadedFile;
    }
}
