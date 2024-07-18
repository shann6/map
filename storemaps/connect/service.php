<?php
$title = "門市服務";
$pageName = "ab_list";

$perPage = 30; #一頁最多30筆資料
$page = isset($_GET['page']) ? intval($_GET['page']) :1;
if($page<1){
  header('Location: ?page=1'); #跳轉頁面
  exit;
}

require __DIR__ . '/db-connect.php';
$t_sql = "SELECT COUNT(1) FROM service1";

$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$totalPages=0;
$rows=[];
if($totalRows){
  $totalPage = ceil($totalRows/$perPage);
  if($page>$totalPage){
    header('Location: ?page=' .$totalPages);
    exit;
  }

 $sql=sprintf(
  "SELECT * FROM service1 ORDER BY service_id LIMIT %s, %s",
  ($page - 1) * $perPage,
  $perPage
 );
}

$rows = $pdo->query($sql)->fetchAll();

?>
<?php include __DIR__ ."/parts/html-head.php"; ?>
<?php include __DIR__ ."/parts/navbar.php"; ?>
<div class="container">
 <div class="row">
  <div class="col">
  <table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>服務ID</th>
      <th>門市服務</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($rows as $r) : ?>
      <tr>
        <td><?= $r['service_id'] ?></td>
        <td><?= $r['service_type'] ?></td>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
  </div>
 </div>


<?php include __DIR__ ."/parts/scripts.php"; ?>
<script>
  const data=<?= json_encode($rows) ?>;
</script>

<?php include __DIR__ ."/parts/html-footer.php"; ?>