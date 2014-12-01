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
        $query = Category::find();

        $this->dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        parent::init();
    }

    protected function renderItem(Category $model, $index)
    {
        /** @var Project $project */
        $odd = $index % 2 == 0 ? 'left' : 'right';

        $project = $model->getRandomProject();

        $photoLink = $project->getMainPhoto();

        $content = Html::a(
            GeneralHelper::mb_ucfirst($model->processedValue),
            ['catalog/'.$model->url],
            ['class' => '_category']
        );
        $content .= Html::a(
            Html::tag('div', $project->title, ['class' => '_title-project']) .
            Html::img($photoLink, ['alt' => 'Картинка дома', 'style' => 'width: 492px; height: 240px;']) .
            '<div class="_more-button">
                            <div class="show-more-btn-wrapper"><span class="show-more-btn">Подробнее</span></div>
                        </div>',
            ['catalog/'.$model->url.'/'.$project->numCat],
            ['class' => 'picture-block']
        );

        return Html::tag('div', $content, ['class' => '_content ' . $odd]);
    }
}
