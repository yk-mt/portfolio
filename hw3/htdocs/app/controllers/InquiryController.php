<?php

class InquiryController{
    public static function index(){
        //viewの読み込み
        require_once __DIR__."./../models/inquiry.php";
        require_once __DIR__."/../views/top.php";
    }
    public static function admin(){
        session_start();
        if ( ! $_SESSION['user_id'] ) {
            header('Location: /login');
        }
        //viewの読み込み
        require_once __DIR__."/../views/admin.php";
    }
    public static function login(){
        //viewの読み込み
        require_once __DIR__."/../views/login.php";
    }
    public static function send(){
        //送信処理
        require_once __DIR__."./../models/inquiry.php";
        
        if(
           isset($_POST['body']) 
           && isset($_POST['email'])
           && isset($_POST['inquiry_type'])
        ){
            $inquiry_type = 0;
            if(in_array('AAAAに関する問い合わせ', $_POST['inquiry_type'], true))$inquiry_type = $inquiry_type | 2;
            if(in_array('BBBBに関する問い合わせ', $_POST['inquiry_type'], true))$inquiry_type = $inquiry_type | 4;
            if(in_array('CCCCに関する問い合わせ', $_POST['inquiry_type'], true))$inquiry_type = $inquiry_type | 8;
            if(in_array('DDDDに関する問い合わせ', $_POST['inquiry_type'], true))$inquiry_type = $inquiry_type | 16;
            //投稿がある場合のみ
            (new Inquiry())->insert(
                $_POST["body"], 
                $_POST["email"], 
                $inquiry_type,
                $_POST["name"]//,
                //$_POST["file"]
            );
        }
        
        header('Location: /');
    }
}