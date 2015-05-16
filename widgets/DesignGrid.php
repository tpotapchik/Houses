<?php
/**
 * Created by PhpStorm.
 * User: coxa
 * Date: 28.03.15
 * Time: 16:46
 */

namespace app\widgets;


use app\models\Design;
use app\models\DesignPhoto;
use app\models\GeneralHelper;
use app\models\Project;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class DesignGrid extends CategoryGrid
{
    public $pageSize = 9;

    protected function renderItem($model, $index)
    {
        /** @var Design $model */
        /** @var Project $project */
//        $odd = $index % 2 == 0 ? 'left' : 'right';

        /** @var DesignPhoto $photoLink */
        $photoLink = $model->getDesignPhotos()->one();

//        $content = Html::a(
//            GeneralHelper::mb_ucfirst($model->processedValue),
//            ['catalog/'.$model->url],
//            ['class' => '_category']
//        );
        $content = Html::a(
            Html::tag('div', $model->title, ['class' => '_title']) .
            Html::img($photoLink->getFile(327, 206), ['alt' => '', 'style' => 'width: 327px; max-height: 206px;']),
            $model->getLink(),
            ['class' => 'interior-block left']
        );

//        return Html::tag('div', $content, ['class' => '_content ' . $odd]);
        return $content;
    }

    /**
     * Renders the pager.
     * @return string the rendering result
     */
    public function renderPager()
    {
        $pagination = $this->dataProvider->getPagination();
        $pagination->setPageSize($this->pageSize);
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
}