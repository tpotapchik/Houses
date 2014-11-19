<?php
/**
 * Houses
 * User: coxa
 * Date: 20.11.14
 * Time: 0:18
 */

namespace app\widgets;


use app\models\Photo;
use app\models\Project;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\BaseListView;

class ProjectsGrid extends BaseListView
{
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

        return Html::tag('div', $result, ['class' => 'main-block projects-house clearfix']);
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
        /** @var Project $model */
        $odd = $index % 2 == 0 ? 'left' : 'right';

        $photoLink = '/img/temp/house1.jpg';
        /** @var Photo $photo */
        $photo = $model->getPhotos()->where('title=:title', [':title'=>'фото'])->one();
        if ($photo) {
            $photoLink = $photo->file;
        }

        $content = Html::a(
                        Html::tag('div', $model->title, ['class' => '_title-project']) .
                        Html::img($photoLink, ['alt' => 'Картинка дома', 'style' => 'width: 492px; height: 240px;']) .
                        '<div class="_more-button">
                            <div class="show-more-btn-wrapper"><span class="show-more-btn">Подробнее</span></div>
                        </div>',
                        ['catalog/view/'.$model->numCat],
            ['class' => 'picture-block']
        );

        return Html::tag('div', $content, ['class' => '_content ' . $odd]);
    }
}
