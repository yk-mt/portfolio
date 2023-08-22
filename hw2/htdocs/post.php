<?php

require_once "./orm/orm.php";
$pdo = new MyPDO();

if(isset($_POST['body'])){
    //投稿内容がある場合のみ
    $pdo->insert($_POST['body'], $_POST['name'] ?? '', $_POST['hashtags'] ?? '');
}

header('Location: ./');
exit;