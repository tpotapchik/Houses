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
$title = @$matches[1];
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
    $this->registerLinkTag([
    'rel' => 'canonical',
    'href' => Yii::$app->urlManager->createAbsoluteUrl(
    array_merge([Yii::$app->controller->getRoute()], Yii::$app->controller->actionParams)
    )
    ]);
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
    <link rel="shortcut icon" href="<?= Yii::$app->request->getHostInfo() ?>/favicon.ico" type="image/x-icon" />
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



        <!--end HEADER-->

        <?= $content ?>


    </div>
</div>

<div class="footer">

    <!--<?= \app\widgets\FooterMenu::widget(Yii::$app->params['mainMenu']) ?>-->

    <div class="footer-bottom clearfix">
        <div class="centralize">

            <div class="copyright footer-bottom-item">
                <div class="footer-logo-name">Архитектурное бюро <br />DOBRYDOM.BY</div>
                2013 - <?= date('Y') ?> &copy; Все права защищены
            </div>

            <div class="footer-address footer-bottom-item">
                <div>ул. Тимирязева 67, офис 1412 <br>
                    220035, Республика Беларусь, г.Минcк</div>
            </div>
            <div class="footer-phones  footer-bottom-item">
                <div>+37529 898 87 97</div>
                <div>+37529 898 89 97</div>
            </div>

            <div class="footer-social footer-bottom-item">

                     <a href="<?= $social['fb'] ?>" class="fb">
                                    <?xml version="1.0" ?><!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg height="67px" id="Layer_1" style="enable-background:new 0 0 67 67;" version="1.1" viewBox="0 0 67 67" width="67px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M29.765,50.32h6.744V33.998h4.499l0.596-5.624h-5.095  l0.007-2.816c0-1.466,0.14-2.253,2.244-2.253h2.812V17.68h-4.5c-5.405,0-7.307,2.729-7.307,7.317v3.377h-3.369v5.625h3.369V50.32z   M34,64C17.432,64,4,50.568,4,34C4,17.431,17.432,4,34,4s30,13.431,30,30C64,50.568,50.568,64,34,64z" style="fill-rule:evenodd;clip-rule:evenodd;"/></svg>
                                </a>
                <a href="<?= $social['vk'] ?>" class="vk">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="60" height="60" viewBox="0 0 97.75 97.75">
<g>
	<path d="M48.875,0C21.883,0,0,21.882,0,48.875S21.883,97.75,48.875,97.75S97.75,75.868,97.75,48.875S75.867,0,48.875,0z
		 M73.667,54.161c2.278,2.225,4.688,4.319,6.733,6.774c0.906,1.086,1.76,2.209,2.41,3.472c0.928,1.801,0.09,3.776-1.522,3.883
		l-10.013-0.002c-2.586,0.214-4.644-0.829-6.379-2.597c-1.385-1.409-2.67-2.914-4.004-4.371c-0.545-0.598-1.119-1.161-1.803-1.604
		c-1.365-0.888-2.551-0.616-3.333,0.81c-0.797,1.451-0.979,3.059-1.055,4.674c-0.109,2.361-0.821,2.978-3.19,3.089
		c-5.062,0.237-9.865-0.531-14.329-3.083c-3.938-2.251-6.986-5.428-9.642-9.025c-5.172-7.012-9.133-14.708-12.692-22.625
		c-0.801-1.783-0.215-2.737,1.752-2.774c3.268-0.063,6.536-0.055,9.804-0.003c1.33,0.021,2.21,0.782,2.721,2.037
		c1.766,4.345,3.931,8.479,6.644,12.313c0.723,1.021,1.461,2.039,2.512,2.76c1.16,0.796,2.044,0.533,2.591-0.762
		c0.35-0.823,0.501-1.703,0.577-2.585c0.26-3.021,0.291-6.041-0.159-9.05c-0.28-1.883-1.339-3.099-3.216-3.455
		c-0.956-0.181-0.816-0.535-0.351-1.081c0.807-0.944,1.563-1.528,3.074-1.528l11.313-0.002c1.783,0.35,2.183,1.15,2.425,2.946
		l0.01,12.572c-0.021,0.695,0.349,2.755,1.597,3.21c1,0.33,1.66-0.472,2.258-1.105c2.713-2.879,4.646-6.277,6.377-9.794
		c0.764-1.551,1.423-3.156,2.063-4.764c0.476-1.189,1.216-1.774,2.558-1.754l10.894,0.013c0.321,0,0.647,0.003,0.965,0.058
		c1.836,0.314,2.339,1.104,1.771,2.895c-0.894,2.814-2.631,5.158-4.329,7.508c-1.82,2.516-3.761,4.944-5.563,7.471
		C71.48,50.992,71.611,52.155,73.667,54.161z"/>
</g>
</svg>
                </a>
                  <a href="<?= $social['youtube'] ?>" class="yt">
                                    <svg height="67" viewBox="0 0 67 67" width="67" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M43.527,41.34c-0.278,0-0.478,0.078-0.6,0.244  c-0.121,0.156-0.18,0.424-0.18,0.796v0.896h1.543V42.38c0-0.372-0.062-0.64-0.185-0.796C43.989,41.418,43.792,41.34,43.527,41.34z   M37.509,41.309c0.234,0,0.417,0.076,0.544,0.23c0.123,0.154,0.185,0.383,0.185,0.682v4.584c0,0.286-0.053,0.487-0.153,0.611  c-0.1,0.127-0.256,0.189-0.47,0.189c-0.148,0-0.287-0.033-0.421-0.096c-0.135-0.062-0.274-0.171-0.415-0.313v-5.531  c0.119-0.122,0.239-0.213,0.36-0.271C37.26,41.335,37.383,41.309,37.509,41.309z M42.748,44.658v1.672  c0,0.468,0.057,0.792,0.17,0.974c0.118,0.181,0.313,0.269,0.592,0.269c0.289,0,0.491-0.076,0.606-0.229  c0.114-0.153,0.175-0.489,0.175-1.013v-0.405h1.795v0.456c0,0.911-0.217,1.596-0.657,2.059c-0.435,0.459-1.089,0.687-1.958,0.687  c-0.781,0-1.398-0.242-1.847-0.731c-0.448-0.486-0.676-1.157-0.676-2.014v-3.986c0-0.768,0.249-1.398,0.742-1.882  c0.493-0.485,1.128-0.727,1.911-0.727c0.799,0,1.413,0.225,1.843,0.674c0.429,0.448,0.642,1.093,0.642,1.935v2.264H42.748z   M39.623,48.495c-0.271,0.336-0.669,0.501-1.187,0.501c-0.343,0-0.646-0.062-0.912-0.192c-0.267-0.129-0.519-0.327-0.746-0.601  v0.681h-1.764V36.852h1.764v3.875c0.237-0.27,0.485-0.478,0.748-0.617c0.267-0.142,0.534-0.211,0.805-0.211  c0.554,0,0.975,0.189,1.265,0.565c0.294,0.379,0.438,0.933,0.438,1.66v4.926C40.034,47.678,39.897,48.159,39.623,48.495z   M31.958,48.884v-0.976c-0.325,0.361-0.658,0.636-1.009,0.822c-0.349,0.191-0.686,0.282-1.014,0.282  c-0.405,0-0.705-0.129-0.913-0.396c-0.201-0.266-0.305-0.658-0.305-1.189v-7.422h1.744v6.809c0,0.211,0.037,0.362,0.107,0.457  c0.077,0.095,0.196,0.141,0.358,0.141c0.128,0,0.292-0.062,0.488-0.188c0.197-0.125,0.375-0.283,0.542-0.475v-6.744h1.744v8.878  H31.958z M25.916,38.6v10.284h-1.968V38.6h-2.034v-1.748h6.036V38.6H25.916z M33.994,32.978c0-0.001,12.08,0.018,13.514,1.45  c1.439,1.435,1.455,8.514,1.455,8.555c0,0-0.012,7.117-1.455,8.556C46.074,52.969,33.994,53,33.994,53s-12.079-0.031-13.516-1.462  c-1.438-1.435-1.441-8.502-1.441-8.556c0-0.041,0.004-7.12,1.441-8.555C21.916,32.996,33.994,32.977,33.994,32.978z M43.52,29.255  h-1.966v-1.08c-0.358,0.397-0.736,0.703-1.13,0.909c-0.392,0.208-0.771,0.312-1.14,0.312c-0.458,0-0.797-0.146-1.027-0.437  c-0.229-0.291-0.345-0.727-0.345-1.311v-8.172h1.962v7.497c0,0.231,0.045,0.399,0.127,0.502c0.08,0.104,0.216,0.156,0.399,0.156  c0.143,0,0.327-0.069,0.548-0.206c0.22-0.137,0.423-0.312,0.605-0.527v-7.422h1.966V29.255z M32.847,27.588  c0.139,0.147,0.339,0.219,0.6,0.219c0.266,0,0.476-0.075,0.634-0.223c0.157-0.152,0.235-0.358,0.235-0.618v-5.327  c0-0.214-0.08-0.387-0.241-0.519c-0.16-0.131-0.37-0.196-0.628-0.196c-0.241,0-0.435,0.065-0.586,0.196  c-0.148,0.132-0.225,0.305-0.225,0.519v5.327C32.636,27.233,32.708,27.439,32.847,27.588z M31.408,19.903  c0.528-0.449,1.241-0.674,2.132-0.674c0.812,0,1.48,0.237,2.001,0.711c0.517,0.473,0.777,1.083,0.777,1.828v5.051  c0,0.836-0.255,1.491-0.762,1.968c-0.513,0.476-1.212,0.714-2.106,0.714c-0.858,0-1.547-0.246-2.064-0.736  c-0.513-0.492-0.772-1.153-0.772-1.984v-5.068C30.613,20.954,30.877,20.351,31.408,19.903z M25.262,16h-2.229l2.634,8.003v5.252  h2.213v-5.5L30.454,16h-2.25l-1.366,5.298h-0.139L25.262,16z M34,64C17.432,64,4,50.568,4,34C4,17.431,17.432,4,34,4  s30,13.431,30,30C64,50.568,50.568,64,34,64z" style="fill-rule:evenodd;clip-rule:evenodd;"/></svg>
                                </a>
                                <a href="<?= $social['gPlus'] ?>" class="gp">
                                    <svg height="67" viewBox="0 0 67 67" width="67" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M32.963,35.002c1.609-1.608,1.734-3.845,1.734-5.102  c0-5.051-2.99-12.875-8.796-12.875c-1.81,0-3.77,0.91-4.9,2.31c-1.181,1.468-1.533,3.353-1.533,5.162  c0,4.7,2.714,12.465,8.746,12.465C29.948,36.962,31.833,36.107,32.963,35.002z M4,34c0,7.405,2.683,14.184,7.129,19.415  c0.839-1.41,2.14-2.797,4.066-3.937c4.348-2.664,10.204-3.017,13.37-3.218c-0.98-1.257-2.111-2.589-2.111-4.774  c0-1.182,0.352-1.885,0.704-2.715c-0.779,0.076-1.533,0.151-2.237,0.151c-7.414,0-11.611-5.529-11.611-10.983  c0-3.217,1.483-6.791,4.473-9.377c3.996-3.284,8.746-3.845,12.516-3.845H44.7l-4.474,2.516h-4.322  c1.607,1.329,4.951,4.127,4.951,9.449c0,5.178-2.941,7.615-5.856,9.926c-0.93,0.906-1.96,1.886-1.96,3.418  c0,1.533,1.03,2.389,1.81,3.017l2.513,1.96c3.092,2.564,5.881,4.951,5.881,9.777c0,3.182-1.484,6.376-4.379,8.826  c-1.557,0.255-3.153,0.388-4.781,0.393c2.938-1.289,4.461-3.646,4.461-6.48c0-3.568-2.287-5.453-7.615-9.248  c-0.553-0.051-0.905-0.051-1.608-0.051c-0.628,0-4.398,0.127-7.338,1.106c-1.533,0.553-6.006,2.237-6.006,7.213  c0,0.541,0.058,1.065,0.17,1.569C8.775,52.645,4,43.88,4,34z M61.73,22.532L61.73,22.532c0.44,1.063,0.821,2.159,1.139,3.281  C62.552,24.691,62.171,23.596,61.73,22.532L61.73,22.532L61.73,22.532L61.73,22.532z M34,64C17.432,64,4,50.568,4,34  C4,17.431,17.432,4,34,4c12.507,0,23.227,7.653,27.73,18.532l0,0h-5.966v-7.814h-3.349v7.814h-7.814v3.281h7.814v7.882h3.349v-7.882  h7.104C63.605,28.415,64,31.162,64,34C64,50.568,50.568,64,34,64z" style="fill-rule:evenodd;clip-rule:evenodd;"/></svg>
                                </a>

            </div>

        </div>
    </div>
</div>
<div class="back-top"><span></span></div>

<?php $this->endBody() ?>
<!--<div class="share42init" data-top1="150" data-top2="310" data-margin="20" data-path="/js/share42/"></div>
<div><img src="/img/social-help.png" alt="" class="social-help"/></div>-->
<script src="/js/plugins/parallax.min.js"></script>
</body>
</html>
<?php $this->endPage() ?>
