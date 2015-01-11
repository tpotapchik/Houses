<?php
/**
 * Created by PhpStorm.
 * User: coxa
 * Date: 07.01.15
 * Time: 15:09
 * @version GIT: 1
 * @php 5.4
 */

namespace app\library;

use yii\base\Behavior;
use yii\base\ModelEvent;
use yii\db\ActiveRecord;

/**
 * Class UserPasswordBehavior
 * @package Library
 * @author coxa <sahnovski@gmail.com>
 * @property $owner User
 */
class UserPasswordBehavior extends Behavior
{
    /**
     * Events declaration
     * @return array
     */
    public function events()
    {
        return [
//            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeInsert',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeUpdate',
//            ActiveRecord::EVENT_AFTER_INSERT => 'afterInsert'
        ];
    }

    /**
     * Before update user behavior
     * @param ModelEvent $event
     */
    public function beforeUpdate(ModelEvent $event)
    {
//        dump($this->owner); die;
    }
}
