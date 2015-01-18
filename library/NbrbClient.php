<?php
/**
 * Created by PhpStorm.
 * User: coxa
 * Date: 18.01.15
 * Time: 14:25
 */

namespace app\library;

use Yii;

class NbrbClient
{

    private $_xmlUrl = '';

    const CURRENCY_USD = 'USD';

    public function __construct()
    {
        $this->_xmlUrl = Yii::$app->params['nbrbUrl'];
        $this->cahe = Yii::$app->getCache();
    }

    /**
     * @param string $date format 'm/d/Y'
     * @param string $charCodeCurrency
     * @return int
     */
    public function getCurrencyOnDate($date = null, $charCodeCurrency = self::CURRENCY_USD)
    {
        if (is_null($date)) {
            $date = date('m/d/Y');
        }

        $cacheKey = $charCodeCurrency . '_' . $date;
        if ($this->cahe->exists($cacheKey)) {
            return $this->cahe->get($cacheKey);
        } else {
            $rate = $this->getOnlineCurrency($date, $charCodeCurrency);
            $this->cahe->set($cacheKey, $rate, 60 * 60 * 24);
            return $rate;
        }
    }

    private function getOnlineCurrency($date, $charCodeCurrency = self::CURRENCY_USD)
    {
        $data = file_get_contents($this->_xmlUrl . '/?ondate=' . $date);
        $xml = simplexml_load_string($data);
        $xml_array = unserialize(serialize(json_decode(json_encode((array) $xml), 1)));

        $result = null;

        foreach ($xml_array['Currency'] as $currency) {
            if ($currency['CharCode'] === $charCodeCurrency) {
                $result = $currency;
                break;
            }
        }

        return intval($result['Rate']);
    }
}
