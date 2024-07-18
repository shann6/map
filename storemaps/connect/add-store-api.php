<?php
require __DIR__ . '/db-connect.php';
header('Content-Type: application/json');

$output = [
  'success' => false,
  'bodayData' => $_POST, #除錯用
];

// Proceed with SQL insert query using these values
$sql = "INSERT INTO `storetable1` 
        (`s_name`, `s_address`,`open_time`,`close_time`,`s_people`)
        VALUES (?,?,?,?,?)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
  $_POST['s_name'],
  $_POST['s_address'],
  $_POST['open_time'],
  $_POST['close_time'],
  $_POST['s_people'],
]);

$output['success'] = !!$stmt->rowCount();
echo json_encode($output);


header('Location: index_store.php'); # 更新成功後，跳轉回列表頁面
exit;