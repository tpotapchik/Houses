<?php
/**
 * Houses
 * User: coxa
 * Date: 13.11.14
 * Time: 0:28
 */
use app\models\Category;

$menu = Yii::$app->params['mainMenu'];
foreach ($menu['items'] as $key => $item) {
    if ($item['label'] === 'Каталог проектов') {
        $menu['items'][$key]['items'] = Category::getMenu();
        break;
    }
}
?>

<?= app\widgets\Menu::widget($menu) ?>
