<?php

// ドライバ呼び出しを使用して MySQL データベースに接続します
$dsn = 'mysql:dbname=sorachora_pra;host=mysql8063.xserver.jp';
$user = 'sorachora_pra';
$password = 'sora1103';

$dbh = new PDO($dsn,$user,$password);

?>
