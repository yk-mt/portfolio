<?php
//今回指定するファイル名を仮にsample.txtとし、ディレクトリ位置に存在するものとしパスを定数として設定。
define("FILE_PATH", __DIR__ . "/sample.txt");

//ファイルの読み込み処理
$file = file_get_contents(FILE_PATH);

//改行ごとにファイルデータを分割する
//explode
$rows =  preg_split("/(\r\n|\r|\n)/", $file);

//結果を格納するオブジェクト
$result = [];

//行ごとにカウント処理
foreach ($rows as $row) {
    //対応する都道府県名のキーがない場合初期値を設定
    if(!array_key_exists($row, $result)) $result[$row] = 0;

    //カウント
    $result[$row]++;
}


//結果表示 
foreach ($result as $key => $item) {
    echo $key . ' : ' . $item . '<br>'; //キー：件数で出力する
}
