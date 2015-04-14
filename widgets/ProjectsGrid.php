<?php
/**
 * Houses
 * User: coxa
 * Date: 20.11.14
 * Time: 0:18
 */

namespace app\widgets;

use app\models\Project;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\BaseListView;

class ProjectsGrid extends BaseListView
{
    public $layout = "{pageSize}\n{items}\n{pager}";
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

    public function renderSection($name)
    {
        $parentResult = parent::renderSection($name);
        if ($parentResult === false) {
            switch ($name) {
                case '{pageSize}':
                    return $this->renderPageSize();
                default:
                    return false;
            }
        }

        return $parentResult;
    }

    protected function renderPageSize()
    {
        $pagination = $this->dataProvider->getPagination();
        //<div class="sorting-projects">Показать: <a href="#">20</a><a href="#">50</a><a href="#">100</a></div>
        $result = '';
        $links = '';
        $links .= Html::a('20', $pagination->createUrl($pagination->getPage(), 20));
        $links .= Html::a('50', $pagination->createUrl($pagination->getPage(), 50));
        $links .= Html::a('100', $pagination->createUrl($pagination->getPage(), 100));
        $result .= Html::tag('div', 'Показать: ' . $links, ['class' => 'sorting-projects']);
        return $result;
    }
}
