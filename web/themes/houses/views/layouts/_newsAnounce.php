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
	<ul class="list-news__content">
		<li class="list-news__item-wrap">
			<a class="list-news__item" href="#">
				<img src="" alt=""/>
				<div>Зимнее строительство: плюсы и особенности</div>
			</a>
		</li>

		<li class="list-news__item-wrap">
			<a class="list-news__item" href="#">
				<img src="" alt=""/>
				<div>Как подобрать проект?</div>
			</a>
		</li>
	</ul>
	<span class="square"></span>
</div>