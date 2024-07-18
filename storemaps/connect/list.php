<?php

require __DIR__. '/db-connect.php';

$sql = "SELECT * FROM storetable1 LIMIT 11";
$stmt = $pdo->query($sql);


$rows = $stmt->fetchAll();

header('Content-Type: application/json'); #告訴瀏覽器內容為JSON
echo json_encode($rows, JSON_UNESCAPED_UNICODE);