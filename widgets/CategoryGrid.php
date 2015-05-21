<?php

namespace app\widgets;

use app\models\Category;
use app\models\GeneralHelper;
use app\models\Project;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;

class CategoryGrid extends ProjectsGrid
{
    public function init()
    {
        parent::init();
    }

    protected function renderItem($model, $index)
    {
        /** @var Project $project */
        $odd = $index % 2 == 0 ? 'left' : 'right';

        /** @var Category $model */
        $project = $model->getRandomProject();

        $photoLink = $project->getMainPhoto(492, 369);

        $content = Html::a(
            Html::tag('div', GeneralHelper::mb_ucfirst($model->processedValue), ['class' => '_title-project']) .
            Html::img($photoLink, ['alt' => $project->title, 'style' => 'width: 492px; height: auto;']) .
            '<div class="_more-button">
                            <div class="show-more-btn-wrapper"><span class="show-more-btn">Подробнее</span></div>
                        </div>',
            $model->getLink(),
            ['class' => 'picture-block']
        );

        return Html::tag('div', $content, ['class' => '_content ' . $odd]);
    }
}
