<?php
/**
 * Created by PhpStorm.
 * User: coxa
 * Date: 18.01.15
 * Time: 13:44
 */

use app\models\Article;
use yii\helpers\Html;

//todo what about cache this query?
//get 5th last news
$articles = Article::find()->limit(5)->orderBy(['created_at' => SORT_DESC])->andWhere(['category_id' => 2,
    'is_published' => true])->all();

?>
<div class="list-news">
    <h2>Новости</h2>
    <ul class="list-news-content">
        <?php
        /** @var Article $article */
        foreach ($articles as $article) {
                echo Html::tag('li', Html::a($article->title, ['news/'.$article->url_key]));
        }
        ?>
    </ul>
    <span class="square"></span>
</div>