<?php
/**
 * Houses
 * User: coxa
 * Date: 13.11.14
 * Time: 1:13
 */

namespace app\widgets;


use Yii;
use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class Menu extends Widget
{

    public $items = [];
    public $route;
    public $params;

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
        if ($this->route === null && Yii::$app->controller !== null) {
            $this->route = Yii::$app->controller->getRoute();
        }
        if ($this->params === null) {
            $this->params = Yii::$app->request->getQueryParams();
        }
    }

    public function run()
    {
        $result = '';

        $result .= Html::beginTag('div', [
            'class' => 'header-menu'
        ]);
        $result .= Html::beginTag('div', [
            'class' => 'centralize clearfix'
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

    /**
     * Checks whether a menu item is active.
     * This is done by checking if [[route]] and [[params]] match that specified in the `url` option of the menu item.
     * When the `url` option of a menu item is specified in terms of an array, its first element is treated
     * as the route for the item and the rest of the elements are the associated parameters.
     * Only when its route and parameters match [[route]] and [[params]], respectively, will a menu item
     * be considered active.
     * @param array $item the menu item to be checked
     * @return boolean whether the menu item is active
     */
    protected function isItemActive($item)
    {
        if (isset($item['url']) && is_array($item['url']) && isset($item['url'][0])) {
            $route = $item['url'][0];
            if ($route[0] !== '/' && Yii::$app->controller) {
                $route = Yii::$app->controller->module->getUniqueId() . '/' . $route;
            }
            if (ltrim($route, '/') !== $this->route) {
                return false;
            }
            unset($item['url']['#']);
            if (count($item['url']) > 1) {
                foreach (array_splice($item['url'], 1) as $name => $value) {
                    if ($value !== null && (!isset($this->params[$name]) || $this->params[$name] != $value)) {
                        return false;
                    }
                }
            }

            return true;
        }

        return false;
    }
}
