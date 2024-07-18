<?php
require __DIR__ . '/parts/admin-required.php';
require __DIR__ . '/db-connect.php';
header('Content-Type: application/json');

$output = [
  'success' => false,
  'bodayData' => $_POST, #除錯用
  'code' => 0,
];

//TODO: 表單欄位檢查
$s_id = isset($_POST['s_id']) ? intval($_POST['s_id']) : 0;
if (empty($s_id)) {
  $output['code'] = 400;
  echo json_encode($output);
  exit;
}
$name = $_POST['s_name'] ?? ''; #??如果??的左邊為undefined,就用右邊的值
if (mb_strlen($name) < 2) {
  $output['code'] = 405;
  echo json_encode($output);
  exit;
}

// $birthday = $_POST['birthday'];
// $ts = strtotime($birthday); #轉換成timestamp
// if ($ts === false) {
//   $birthday = null; #如果不是日期結果空值
// } else {
//   $birthday = date('Y-m-d', $ts);
// }

//錯誤作法

// $sql = "INSERT INTO `address_book`( `name`, `email`, `mobile`, `birthday`, `address`, `created_at`) VALUES (
// '{$_POST['name']}','{$_POST['email']}','{$_POST['mobile']}','{$_POST['birthday']}','{$_POST['address']}',NOW()
// )";
// $stmt=$pdo->query($sql);


$sql = "UPDATE `storetable1` SET `s_name`=?,`s_address`=?,`open_time`=?,`close_time`=?,`s_people`=? WHERE `s_id`=?";

$stmt = $pdo->prepare($sql); #準備sql語法,除了 值 語法要合法
$stmt->execute([
  $name,
  $_POST['s_address'],
  $_POST['open_time'],
  $_POST['close_time'],
  $_POST['s_people'],
  $s_id,

]);

$output['success'] = !!$stmt->rowCount();
echo json_encode($output);