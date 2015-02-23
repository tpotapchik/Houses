<?php
/**
 * Houses
 * User: coxa
 * Date: 20.11.14
 * Time: 12:31
 */

namespace app\library;

use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Filesystem\Filesystem;
use Yii;
use yii\base\Behavior;
use yii\base\ModelEvent;
use yii\db\ActiveRecord;
use yii\helpers\Console;

/**
 * Class PhotoBehavior
 * @package Library
 */
class PhotoInsertBehavior extends Behavior
{
    public $basePath;
    public $baseUrlPart = '/images/';
    private $urlPart;
    private $path;
    /**
     * @var Filesystem
     */
    private $fs;

    /**
     * Events declaration
     * @return array
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeInsert',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeUpdate',
            ActiveRecord::EVENT_AFTER_INSERT => 'afterInsert'
        ];
    }

    /**
     * @param ModelEvent $event
     */
    public function beforeInsert(ModelEvent $event)
    {
        $filename = $this->generateFileName($this->owner->file);
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
            $this->fs->mkdir($this->path);
            $result = false;
            while (!$result) {
                try {
                    $this->fs->copy(html_entity_decode($this->owner->file), $this->path . $filename);
                    $result = true;
                } catch (Exception $e) {
                    echo Console::ansiFormat(
                        "Try AGAIN " . html_entity_decode($this->owner->file) .
                        PHP_EOL .
                        $this->owner->file .
                        PHP_EOL .
                        $this->owner->project_id,
                        [Console::FG_RED]
                    );
                }
            }


        }

        if ($result) {
            $newFilename = $this->getExtention($this->path, $filename);

            if ($newFilename === false) {
                unlink($this->path . $filename);
                echo Console::ansiFormat(
                    "PREVENT INSERTING" .
                    PHP_EOL .
                    $this->owner->file .
                    PHP_EOL .
                    $this->owner->project_id,
                    [Console::FG_RED]
                );
                $event->isValid = false;
                Yii::$app->getCache()->set('prevent', true);
                return;
            } else {
                Yii::$app->getCache()->set('prevent', false);
                rename($this->path . $filename, $this->path . $newFilename);

                $this->owner->file = $this->urlPart . $newFilename;
            }
        } elseif ($coping) {
            echo Console::ansiFormat(
                "cant copy image" . PHP_EOL . $this->owner->file . PHP_EOL,
                [Console::FG_RED]
            );
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
        $this->basePath = \Yii::$app->basePath .
            DIRECTORY_SEPARATOR .
            'web' . DIRECTORY_SEPARATOR .
            'images' . DIRECTORY_SEPARATOR;
        $this->fs = new Filesystem();
    }

    protected function generateFileName($filename)
    {
        $hash = md5('_' . $filename . '_');
        $parts = [];
        for ($i = 0; $i < 3; $i++) {
            $parts[] = substr($hash, 0, 3);
            $hash = substr_replace($hash, '', 0, 3);
        }
        $hasParts = implode(DIRECTORY_SEPARATOR, $parts) . DIRECTORY_SEPARATOR;
        $this->path = $this->basePath . $hasParts;
        $this->urlPart = $this->baseUrlPart . $hasParts;
        $filename = $hash;
        unset($hash);
        unset($hasParts);

        return $filename;
    }

    public function beforeUpdate(ModelEvent $event)
    {
//        throw new Exception('Method not implemented');
        $this->beforeInsert($event);
    }

    /**
     * Get file extention
     * @param string $filePath
     * @param string $filename
     * @return bool|string
     */
    private function getExtention($filePath, $filename)
    {
        $result = exif_imagetype($filePath . $filename);

        switch ($result) {
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
        }
        return $filename . $ext;
    }
}
