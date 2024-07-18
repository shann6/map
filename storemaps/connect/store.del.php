<?php
require __DIR__ . '/parts/admin-required.php';
require __DIR__ . '/db-connect.php';


$s_id = isset($_GET['s_id']) ? intval($_GET['s_id']) :0;
if(! empty($s_id)){
  $sql = "DELETE FROM storetable1 WHERE s_id=$s_id";
  $pdo->query($sql);
}

$come_from = "index_store.php";
if(isset($_SERVER['HTTP_REFERER'])){
  $come_from = $_SERVER['HTTP_REFERER'];
}

header('Location: '. $come_from);