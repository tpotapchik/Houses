<?php
/**
 * Houses
 * User: coxa
 * Date: 13.11.14
 * Time: 9:52
 */

namespace app\widgets;


use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class FooterMenu extends Menu
{
    public function run()
    {
        $result = '';

        $result .= Html::beginTag('div', [
            'class' => 'footer-nav'
        ]);
        $result .= Html::beginTag('div', [
            'class' => 'centralize'
        ]);

        foreach ($this->items as $item) {
            $result .= $this->renderItem($item);
        }

        $result .= Html::endTag('div');
        $result .= Html::endTag('div');

        return $result;
    }

    protected function renderItem($item)
    {
        $item['active'] = false;
        if (is_string($item)) {
            return $item;
        }
        if (!isset($item['label'])) {
            throw new InvalidConfigException("The 'label' option is required.");
        }

        $url = ArrayHelper::getValue($item, 'url', '#');
        $options = [
            'class' => 'header-menu-item'
        ];

        if (isset($item['active'])) {
            $active = ArrayHelper::remove($item, 'active', false);
        } else {
            $active = $this->isItemActive($item);
        }

        if ($active) {
            Html::addCssClass($options, 'active');
        }

        return Html::a($item['label'], $url, $options);
    }
}
