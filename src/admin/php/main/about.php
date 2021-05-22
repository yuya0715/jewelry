<?php
  include("../parts/header.php");
  include("../parts/sidebar.php");
  include("../parts/escape.php");
  include("../parts/db.php");

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
          <h1 class="m-0">About</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <?php
    $sth =  $dbh->prepare("SELECT * FROM about_table");
    $sth->execute();
    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) : ?>
    <form action="" method="post">
      <textarea class="aboutText" name="aboutText">
        <?php echo h($row['content']); ?>
      </textarea>
      <input type="hidden" name="id" value="<?php echo h($row['id']); ?>">
      <?php
    endwhile;
      ?>
      <div>
        <button type="submit" id="insert">修正</button>
      </div>
    </form>
  </div>
  <!-- /.content -->

</div>
<!-- /.content-wrapper -->


<!-- footer area -->
<?php
include("../parts/footer.php");
?>
