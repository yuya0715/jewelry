<?php
  include("./php/parts/header.php");
  include("./php/parts/sidebar.php");
  include("./php/parts/escape.php");
  include("./php/parts/db.php");

  $aboutText = filter_input(INPUT_POST, 'aboutText');
  $id = filter_input(INPUT_POST, 'id');

  if (!empty($aboutText)) {
    $sql = "UPDATE about_table SET content = :content WHERE id = :id";
    $stmt = $dbh->prepare($sql);
    $params = array(':content' => $aboutText, ':id' => $id);
    $stmt->execute($params);
    echo "<script>alert('更新が完了しました');</script>";
  }
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">管理者ID</h1>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">

  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- footer area -->
<?php
include("./php/parts/footer.php");
?>
