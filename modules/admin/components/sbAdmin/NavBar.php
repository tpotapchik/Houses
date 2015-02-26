<?php
/**
 * Created by PhpStorm.
 * User: coxa
 * Date: 09.12.14
 * Time: 23:03
 */

namespace app\modules\admin\components\sbAdmin;


use yii\bootstrap\BootstrapPluginAsset;
use yii\bootstrap\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class NavBar extends \yii\bootstrap\NavBar
{
    /**
     * @var bool
     */
    public $renderNavbarHeader = true;

    public $renderCollapse = true;

    public $tag = 'nav';

    public function init()
    {
        Widget::init();
        $this->clientOptions = false;
        if ($this->renderNavbarHeader) {
            Html::addCssClass($this->options, 'navbar');
        }
        if ($this->options['class'] === 'navbar') {
            Html::addCssClass($this->options, 'navbar-default');
        }
        Html::addCssClass($this->brandOptions, 'navbar-brand');
        if (empty($this->options['role'])) {
            $this->options['role'] = 'navigation';
        }
        $options = $this->options;
        $tag = ArrayHelper::remove($options, 'tag', $this->tag);
        echo Html::beginTag($tag, $options);
        if ($this->renderInnerContainer) {
            if (!isset($this->innerContainerOptions['class'])) {
                Html::addCssClass($this->innerContainerOptions, 'container');
            }
            echo Html::beginTag('div', $this->innerContainerOptions);
        }
        $this->renderNavbarHeader();
        if ($this->renderCollapse) {
            $options = $this->containerOptions;
            $tag = ArrayHelper::remove($options, 'tag', 'div');
            echo Html::beginTag($tag, $options);
        }
    }

    public function run()
    {
        if ($this->renderCollapse) {
            echo Html::endTag('div');
        }
//        echo Html::endTag('div');
        echo Html::endTag('nav');
        BootstrapPluginAsset::register($this->getView());
    }

    /**
     * Renders collapsible toggle button.
     * @return string the rendering toggle button.
     */
    protected function renderToggleButton()
    {
        $bar = Html::tag('span', '', ['class' => 'icon-bar']);
        $screenReader = "<span class=\"sr-only\">{$this->screenReaderToggleText}</span>";
        return Html::button("{$screenReader}\n{$bar}\n{$bar}\n{$bar}", [
            'class' => 'navbar-toggle',
            'data-toggle' => 'collapse',
            'data-target' => ".{$this->containerOptions['id']}",
        ]);
    }

    private function renderNavbarHeader()
    {
        if ($this->renderNavbarHeader) {
            echo Html::beginTag('div', ['class' => 'navbar-header']);
            if (!isset($this->containerOptions['id'])) {
                $this->containerOptions['id'] = "{$this->options['id']}-collapse";
            }
            echo $this->renderToggleButton();
            if ($this->brandLabel !== null) {
                Html::addCssClass($this->brandOptions, 'navbar-brand');
                echo Html::a($this->brandLabel, $this->brandUrl === null ? Yii::$app->homeUrl : $this->brandUrl,
                    $this->brandOptions);
            }
            echo Html::endTag('div');

            Html::addCssClass($this->containerOptions, 'collapse');
            Html::addCssClass($this->containerOptions, 'navbar-collapse');
        }
    }
} 