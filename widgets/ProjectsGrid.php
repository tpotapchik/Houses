<?php
/**
 * Houses
 * User: coxa
 * Date: 20.11.14
 * Time: 0:18
 */

namespace app\widgets;


use app\models\GeneralHelper;
use app\models\Project;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\BaseListView;

class ProjectsGrid extends BaseListView
{
    public $layout = "{items}\n{pager}";
    public $mainBlockClass = 'main-block projects-house clearfix';

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

        return Html::tag('div', $result, ['class' => $this->mainBlockClass]);
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

    protected function renderItem($model, $index)
    {
        /** @var Project $model */
        $odd = $index % 2 == 0 ? 'left' : 'right';

        $photoLink = $model->getMainPhoto();

        $content = Html::a(
            Html::tag('div', $model->title, ['class' => '_title-project']) .
            Html::img($photoLink, ['alt' => 'Картинка дома', 'style' => 'width: 492px; height: auto;']) .
            '<div class="_more-button">
                    <div class="show-more-btn-wrapper"><span class="show-more-btn">Подробнее</span></div>
            </div>',
            $model->getLink(),
            ['class' => 'picture-block']
        );

        return Html::tag('div', $content, ['class' => '_content ' . $odd]);
    }
}
