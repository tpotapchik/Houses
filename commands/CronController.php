<?php
/**
 * Created by PhpStorm.
 * User: coxa
 * Date: 06.11.14
 * Time: 18:41
 */

namespace app\commands;

use app\library\Backup;
use Yii;
use yii\console\Controller;

class CronController extends Controller
{

    /**
     * calls every day at 00:00
     */
    public function actionDaily()
    {
        echo 'Daily cron start' . PHP_EOL;

        $bdBackup = new Backup();
        echo 'backup ok ' . $bdBackup->backupBd() . PHP_EOL;
        echo 'img ' . $bdBackup->backupImages() . PHP_EOL;
    }
}
