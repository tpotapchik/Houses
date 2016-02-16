<?php
/**
 * Created by PhpStorm.
 * User: coxa
 * Date: 06.11.14
 * Time: 18:41
 */

namespace app\commands;


use common\components\BiletiByAPI;
use common\models\Concert;
use common\models\Show;
use common\models\User;
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
    }
}
