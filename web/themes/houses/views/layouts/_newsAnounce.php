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

	<ul class="list-news__content">
		<li class="list-news__item-wrap">
			<a class="list-news__item" href="#">
				<div class="list-news__item-img">
					<img src="http://dom-tut.by/images/1d1/d37/fec/52ea489c1f4df6d1636560e.jpg" alt=""/>
				</div>
				<div class="list-news__item-text">
					<h2>Зимнее строительство: плюсы и особенности</h2>
					<p>Зимнее строительство: плюсы и особенности какой-то текстЗимнее строительство: плюсы и особенности какой-то текст Зимнее строительство: плюсы и особенности какой-то текст
					</p>

					<div class="list-news__date">25-07-2017</div>
				</div>
			</a>
		</li>

		<li class="list-news__item-wrap">
			<a class="list-news__item" href="#">
				<div class="list-news__item-img">
					<img src="" alt=""/>
				</div>
				<div class="list-news__item-text">
					<h2>Как подобрать проект?</h2>
					<p>Зимнее строительство: плюсы и особенности какой-то текст</p>

					<div class="list-news__date">25-07-2017</div>
				</div>
			</a>
		</li>
	</ul>
	<div class="list-news__all">
    		<a href="#">Больше статей</a>
    	</div>
</div>