<?php
/**
 * Houses
 * User: coxa
 * Date: 21.11.14
 * Time: 16:11
 */

namespace app\models;


use Yii;
use yii\base\Model;

class CallUsForm extends Model
{
    public $name;
    public $phoneNumber;
    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'phoneNumber'], 'required'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('house', 'Name'),
            'phoneNumber' => Yii::t('house', 'Phone number'),
            'verifyCode' => Yii::t('yii', 'Verification Code'),
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param  string  $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            $bodyTemplate = 'Привет, меня зовут %s. Перезвоните мне на номер %s.';
            $sendResult = Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$email => $this->name])
                ->setSubject('Перезвоните мне')
                ->setTextBody(sprintf($bodyTemplate, $this->name, $this->phoneNumber))
                ->send();

            return $sendResult;
        } else {
            return false;
        }
    }
}
