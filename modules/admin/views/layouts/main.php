<?php
use app\modules\admin\assets\AdminAsset;
use app\modules\admin\components\sbAdmin\Nav;
use yii\helpers\Html;
use app\modules\admin\components\sbAdmin\NavBar;
use yii\widgets\Breadcrumbs;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <div id="wrapper">

        <?php
        NavBar::begin([
            'brandLabel' => 'Home Control',
            'brandUrl' => [ '/admin/' ],
            'renderInnerContainer' => false,
            'renderNavbarHeader' => true,
            'renderCollapse' => false,
            'options' => [
                'class' => 'navbar-default navbar-static-top',
                'role' => 'navigation',
                'style' => 'margin-bottom: 0'
            ],
            'containerOptions' => [
                'id' => 'sidebar-collapse'
            ]
        ]);

        $topItems = [];
        if (!Yii::$app->user->isGuest) {
            $topItems[] = [
                'label' => '<i class="fa fa-user"></i> ' . ucfirst(Yii::$app->user->identity->username) . ' <i class="fa fa-caret-down"></i>',
                'items' => [
                    [
                        'label' => '<i class="fa fa-sign-out fa-fw" ></i> '.Yii::t('yii', 'Logout'),
                        'url' => ['/site/logout'],
                        'options' => [
                            'class' => 'testClass'
                        ]
                    ],
                ],
                'options' => [
                    'level' => 'dropdown-menu dropdown-user'
                ],
                'linkOptions' => [
                    'class' => 'dropdown-toggle',
                    'data-toggle' => 'dropdown'
                ]
            ];
        }

        echo Nav::widget([
            'encodeLabels' => false,
            'options' => ['class' => 'navbar-top-links navbar-right'],
            'items' => $topItems,
        ]);
            //--start sidebar
            NavBar::begin([
                'renderInnerContainer' => false,
                'renderCollapse' => true,
                'renderNavbarHeader' => false,
                'options' => [
                    'class' => 'navbar-default sidebar',
                    'role' => 'navigation',
    //                'style' => 'margin-bottom: 0',
                    'tag' => 'div'
                ],
                'containerOptions' => ['class' => 'sidebar-collapse'],
            ]);

            $sideItems = [
                [
                    'label' => '<i class="fa fa-dashboard"></i> '.Yii::t('app', 'Dashboard'),
                    'url' => ['/site/index'],
                    'visible' => !Yii::$app->user->isGuest
                ],
                [
                    'label' => '<i class="fa fa-users"></i> '.Yii::t('app', 'Users'),
                    'url' => ['/admin/user/index'],
                    'visible' => !Yii::$app->user->isGuest
                ],
                [
                    'label' => '<i class="fa fa-bank"></i> '.Yii::t('app', 'Projects'),
                    'url' => ['/admin/project/index'],
                    'visible' => !Yii::$app->user->isGuest
                ],
                [
                    'label' => '<i class="fa fa-sitemap"></i> '.Yii::t('app', 'Category\'s'),
                    'url' => ['/admin/category/index'],
                    'visible' => !Yii::$app->user->isGuest
                ],
                [
                    'label' => '<i class="fa fa-archive" ></i>'.Yii::t('app', 'Articles').'<span class="fa arrow"></span>',
                    'url' => ['article/index'],
                    'visible' => !Yii::$app->user->isGuest,
                    'items' => [
                        [
                            'label' => '<i class="fa fa-file"></i> '.Yii::t('app', 'Article'),
                            'url' => ['/admin/articles/article/index'],
                            'visible' => !Yii::$app->user->isGuest
                        ],
                        [
                            'label' => '<i class="fa fa-file"></i> '.Yii::t('app', 'Article Categories'),
                            'url' => ['/admin/articles/article-category/index'],
                            'visible' => !Yii::$app->user->isGuest
                        ],
                    ]
                ]
            ];
            echo Nav::widget([
                'encodeLabels' => false,
                'options' => ['class' => 'nav'],
                'id' => 'side-menu',
                'items' => $sideItems,
            ]);
            NavBar::end();
            //--end sidebar

        NavBar::end();

        //--------------------------------------

        ?>

        <div id="page-wrapper">
            <div class="row">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </div>
            <?= $content ?>
        </div>
    </div>
    <!-- /#wrapper -->
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>