<?php
/**
 * Houses
 * User: coxa
 * Date: 18.11.14
 * Time: 21:15
 */

namespace app\models;


class GeneralHelper extends \yii\db\ActiveRecord
{

    /**
     * @param $value
     * @return int|null
     */
    public static function getOrInsert($value)
    {
        $result = null;
        $model = static::findOne(['value' => $value]);
        if ($model) {
            $result = $model->id;
        } else {
            $model = new static();
            $model->value = $value;
            if ($model->save()) {
                $result = $model->id;
            }
        }
        return $result;
    }

    public static function translitIt($str)
    {
        $tr = [
            "А"=>"a","Б"=>"b","В"=>"v","Г"=>"g","Д"=>"d",
            "Е"=>"e","Ё"=>"yo","Ж"=>"j","З"=>"z","И"=>"i",
            "Й"=>"y","К"=>"k","Л"=>"l","М"=>"m","Н"=>"n",
            "О"=>"o","П"=>"p","Р"=>"r","С"=>"s","Т"=>"t",
            "У"=>"u","Ф"=>"f","Х"=>"h","Ц"=>"c","Ч"=>"ch",
            "Ш"=>"sh","Щ"=>"sch","Ъ"=>"","Ы"=>"yi","Ь"=>"",
            "Э"=>"e","Ю"=>"yu","Я"=>"ya","а"=>"a","б"=>"b",
            "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ё"=>"yo","ж"=>"j",
            "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
            "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
            "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
            "ц"=>"c","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
            "ы"=>"y","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya",
            " "=> "_", "."=> "", "/"=> "_"
        ];
        return strtr($str, $tr);
    }

    public static function translitForUrl($str)
    {
        if (preg_match('/[^A-Za-z0-9_\-]/', $str)) {
            $str = static::translitIt($str);
            $str = preg_replace('/[^A-Za-z0-9_\-]/', '', $str);
        }

        return $str;
    }

    public static function mb_ucfirst($string)
    {
        return mb_strtoupper(mb_substr($string, 0, 1, 'UTF-8'), 'UTF-8') . mb_substr($string, 1, mb_strlen($string), 'UTF-8');
    }
}
