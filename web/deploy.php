<?php
/**
 * Created by PhpStorm.
 * User: coxa
 * Date: 23.11.14
 * Time: 20.51
 */
$password = md5('qwerty123');
?>
<html>
    <body>
        <?php
        if (isset($_POST['auth']['pass']) && md5($_POST['auth']['pass']) == $password) {
            exec('APP_ENV=stage && export APP_ENV');
            //git pull
            exec('cd ../ && git pull', $arr);
            //migrate
            exec('./../yii migrate --interactive=0', $arr1);
            exec('whoami', $arr2);
            var_dump($arr, $arr1, $arr2);
            echo 'deployng...';
        } else {
            ?>
            <h1>auth</h1>
            <form action="" method="post">
                <label>pass:<input type="password" name="auth[pass]"></label>
                <input type="submit" value="send">
            </form>
        <?php
        }
        ?>
    </body>
</html>