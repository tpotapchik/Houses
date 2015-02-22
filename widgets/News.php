<?php
/**
 * Created by PhpStorm.
 * User: coxa
 * Date: 22.02.15
 * Time: 21:54
 */

namespace app\widgets;


use app\models\Article;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\BaseListView;

class News extends BaseListView{

    public $layout = "{items}\n{pager}";

    /**
     * Renders the data models.
     * @return string the rendering result.
     */
    public function renderItems()
    {
        $models = array_values($this->dataProvider->getModels());
        $result = '';

        foreach ($models as $index => $model) {
            $result .= $this->renderItem($model, $index);
        }

        return Html::tag('div', $result, ['class' => 'main-text-block ovhidden']);
    }

    /**
     * Renders the pager.
     * @return string the rendering result
     */
    public function renderPager()
    {
        $pagination = $this->dataProvider->getPagination();
        if ($pagination === false || $this->dataProvider->getCount() <= 0) {
            return '';
        }
        /* @var $class Pager */
        $pager = $this->pager;
        $class = ArrayHelper::remove($pager, 'class', Pager::className());
        $pager['pagination'] = $pagination;
        $pager['view'] = $this->getView();

        return $class::widget($pager);
    }

    private function renderItem($model, $index)
    {
        /** @var Article $model */

        $content = Html::tag('div', Html::tag('span', $model->title, ['class' => '_text']), ['class' => 'news-head']);
        $content .= Html::tag('div', $model->intro_text, ['class' => 'news-short-info']);
        $content .= Html::tag('div', $model->full_text, ['class' => 'news-body']);
        $content .= Html::tag('div', 'Читать полностью', ['class' => 'more-btn']);

        return Html::tag('div', $content, ['class' => 'main-text-block-wrap clearfix']);
    }
}
