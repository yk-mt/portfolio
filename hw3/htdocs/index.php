<?php 
    //php8以降は不要
    function startsWith($haystack, $needle){
        return strpos($haystack, $needle) === 0;
    }

    $requests = explode("/", $_GET['request'] ?? '/');
    require_once './app/controllers/InquiryController.php';
    if( $requests[0] === '' ){
        InquiryController::index();
    }else if( startsWith($requests[0], 'login') ){
        InquiryController::login();
    }else if( startsWith($requests[0], 'post') ){
        InquiryController::send();
    }else if( startsWith($requests[0], 'admin') ){
        InquiryController::admin();
    }else{
        ?>
        <p><a href="/">問い合わせ画面</a></p>
        <p><a href="/admin/">管理画面</a></p>
        <p><a href="http://localhost:8081">phpMyAdmin</a></p>
        <hr>
        <p>DBアカウント・パスワード等について、詳しくはReadMe.mdをご確認ください。</p>
        <?php
    }
