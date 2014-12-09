<?php
use app\modules\admin\assets\AdminAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
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
            'brandUrl' => Yii::$app->homeUrl,
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
                'label' => '<i class="fa fa-user"></i> ' . ucfirst(Yii::$app->user->identity->username),
                'items' => [
                    [
                        'label' => '<i class="fa fa-sign-out fa-fw" ></i> '.Yii::t('yii', 'Logout'),
                        'url' => ['/site/logout'],
                    ]
                ]
            ];
        }

        echo Nav::widget([
            'encodeLabels' => false,
            'options' => ['class' => 'navbar-top-links navbar-right'],
            'items' => $topItems,
        ]);


        NavBar::end();

        //--------------------------------------
        NavBar::begin([
            'renderInnerContainer' => false,
            'renderCollapse' => true,
            'renderNavbarHeader' => false,
            'options' => [
                'class' => 'navbar-default navbar-static-side',
                'role' => 'navigation',
                'style' => 'margin-bottom: 0'
            ],
            'containerOptions' => ['class' => 'sidebar-collapse'],
        ]);

        $sideItems = [
            [
                'label' => '<i class="fa fa-dashboard"></i> '.Yii::t('yii', 'Dashboard'),
                'url' => ['/site/index'],
                'visible' => !Yii::$app->user->isGuest
            ],
            [
                'label' => '<i class="fa fa-users"></i> '.Yii::t('yii', 'Users'),
                'url' => ['user/index'],
                'visible' => !Yii::$app->user->isGuest
            ],
            [
                'label' => '<i class="fa fa-bank"></i> '.Yii::t('yii', 'Projects'),
                'url' => ['project/index'],
                'visible' => !Yii::$app->user->isGuest
            ]
        ];
        echo Nav::widget([
            'encodeLabels' => false,
            'options' => ['class' => 'nav'],
            'id' => 'side-menu',
            'items' => $sideItems,
        ]);
        NavBar::end();
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
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>