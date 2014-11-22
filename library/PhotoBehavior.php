<?php
/**
 * Houses
 * User: coxa
 * Date: 20.11.14
 * Time: 12:31
 */

namespace app\library;


use Yii;
use yii\base\Behavior;
use yii\base\ModelEvent;
use yii\db\ActiveRecord;
use yii\helpers\Console;

class PhotoBehavior extends Behavior
{
    public $path;
    public $urlPart = '/images/';

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeInsert',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeUpdate',
            ActiveRecord::EVENT_AFTER_INSERT => 'afterInsert'
        ];
    }

    public function beforeInsert(ModelEvent $event)
    {
        $filename = md5($this->owner->file);
        $coping = true;
        $result = false;

        if (file_exists($this->path . $filename . '.jpg')) {
            $coping = false;
            $this->owner->file = $this->urlPart . $filename . '.jpg';
        } elseif (file_exists($this->path . $filename . '.gif')) {
            $coping = false;
            $this->owner->file = $this->urlPart . $filename . '.gif';
        }

        if ($coping) {
            $result = copy(html_entity_decode($this->owner->file), $this->path . $filename);
        }

        if ($result) {

            $newFilename = $this->getExtention($this->path, $filename);

            if ($newFilename === false) {
                unlink($this->path . $filename);
                echo Console::ansiFormat("PREVENT INSERTING\n".$this->owner->file."\n".$this->owner->project_id, [Console::FG_RED]);
                $event->isValid = false;
                Yii::$app->getCache()->set('prevent', true);
                return;
            } else {
                Yii::$app->getCache()->set('prevent', false);
                rename($this->path . $filename, $this->path . $newFilename);

                $this->owner->file = $this->urlPart . $newFilename;
            }
        } elseif ($coping) {
            echo Console::ansiFormat("cant copy image\n" . $this->owner->file . "\n", [Console::FG_RED]);
        }
        if (Yii::$app->getCache()->get('prevent')) {
            echo Console::ansiFormat("INSERTING...\n", [Console::FG_GREEN]);
        }
    }

    public function afterInsert()
    {
        if (Yii::$app->getCache()->get('prevent')) {
            echo 'INSERTED' . PHP_EOL;
            Yii::$app->getCache()->set('prevent', false);
        }
    }

    public function init()
    {
        $this->path = \Yii::$app->basePath . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR;
    }

    public function beforeUpdate()
    {
        echo 'update';
    }

    private function getExtention($filePath, $filename)
    {
        $result = exif_imagetype($filePath . $filename);

        switch ($result)
        {
            case IMAGETYPE_GIF:
                $ext = '.gif';
            break;
            case IMAGETYPE_JPEG:
                $ext = '.jpg';
                break;
            case IMAGETYPE_JPEG2000:
                $ext = '.jpeg2000';
                break;
            default:
                return false;
            break;
        }
        return $filename . $ext;
    }

}
