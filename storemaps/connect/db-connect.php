<?php
require __DIR__. '/connect-settings.php';

$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4";

$pdo_options=[
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

];

$pdo = new PDO($dsn,$db_user,$db_pass,$pdo_options);

if(!isset($_SESSION)){
  //如果尚未啟動session的功能就啟動
  session_start();
}


// $stmt = $pdo->query("SELECT * FROM storetable1 LIMIT 11");

// $row = $stmt->fetch();
// echo json_encode($row);
// 