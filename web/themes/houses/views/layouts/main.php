<?php
use app\assets\AppAsset;
use app\models\Article;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use yii\helpers\BaseUrl;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
$isProdEnv = !(getenv('APP_ENV') == 'dev' || $_SERVER['HTTP_HOST'] == 'house.loc');

$social = Yii::$app->params['social'];

$mainArticle = Article::getMain();

if (strlen($this->title) > 0) {
    $expression = '/^.+? - (.+?)$/';
    preg_match($expression, $mainArticle->title, $matches);
    $title = $matches[1];
    $this->title .= ' - ' . $title;
} else {
    $this->title = $mainArticle->title;
}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html lang="<?= Yii::$app->language ?>" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html lang="<?= Yii::$app->language ?>" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html lang="<?= Yii::$app->language ?>" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="<?= Yii::$app->language ?>" class="no-js"> <!--<![endif]-->
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <?php
    $this->title = str_replace(['\'', '"'], '', $this->title);
    ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head();

    if ($isProdEnv) :
        //google analytics disable on test environment
    ?>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-60177798-1', 'auto');
          ga('send', 'pageview');

        </script>
    <?php endif; ?>
    <link rel="shortcut icon" href="http://dom-tut.by/favicon.ico" type="image/x-icon" />
</head>

<body>
<?php if ($isProdEnv) : ?>
<!--LiveInternet counter--><script type="text/javascript"><!--
new Image().src = "//counter.yadro.ru/hit?r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random();//--></script><!--/LiveInternet-->
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter28723431 = new Ya.Metrika({id:28723431,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/28723431" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<?php endif; ?>

    <?php $this->beginBody() ?>
    <div class="page">
    <div class="page_i">
    <?= $this->render('_header', ['social' => $social]) ?>
    <?= $this->render('_header-menu', []) ?>


    <!--end HEADER-->

    <?= $content ?>


    </div>
    </div>

    <div class="footer">

        <?= \app\widgets\FooterMenu::widget(Yii::$app->params['mainMenu']) ?>

        <div class="footer-bottom">
            <div class="centralize">
                <span class="copyright">
                    2013 - <?= date('Y') ?> &copy; Все права защищены
                </span>

                <div class="footer-social">
                    <a href="<?= $social['youtube'] ?>" class="yt"></a>
                    <a href="<?= $social['gPlus'] ?>" class="gp"></a>
                    <a href="<?= $social['vk'] ?>" class="vk"></a>
                    <a href="<?= $social['fb'] ?>" class="fb"></a>
                </div>

            </div>
        </div>
    </div>
    <div class="back-top"><span></span></div>

    <?php $this->endBody() ?>
<div class="share42init" data-top1="150" data-top2="310" data-margin="20"></div>
<div><img src="/img/social-help.png" alt="" class="social-help"/></div>

<script type="text/javascript" src="http://dom-tut.by/js/share42/share42.js"></script>
</body>
</html>
<?php $this->endPage() ?>
