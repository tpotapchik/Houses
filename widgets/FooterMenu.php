<?php
/**
 * Houses
 * User: coxa
 * Date: 13.11.14
 * Time: 9:52
 */

namespace app\widgets;


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
        return parent::renderItem($item);
    }
}
