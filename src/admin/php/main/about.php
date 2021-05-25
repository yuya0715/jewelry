<?php

  include("../parts/escape.php");
  include("../parts/db.php");

  $aboutTitle = filter_input(INPUT_POST, 'aboutTitle');
  $aboutContent1 = filter_input(INPUT_POST, 'aboutContent1');
  $aboutImg = filter_input(INPUT_POST, 'aboutImg');
  $aboutContent2 = filter_input(INPUT_POST, 'aboutContent2');
  $id = filter_input(INPUT_POST, 'id');

  if (!empty($aboutTitle)) {
    $sql = "UPDATE 
              about_table
            SET 
              about_title = :about_title,
              about_content1 = :about_content1,
              about_img = :about_img,
              about_content2 = :about_content2
            WHERE 
              id = :id";
    $stmt = $dbh->prepare($sql);
    $params = array(
             ':about_title' => $aboutTitle,
             ':about_content1' => $aboutContent1,
             ':about_img' => $aboutImg,
             ':about_content2' => $aboutContent2,
             ':id' => $id
            );
    $stmt->execute($params);
    echo "<script>alert('更新が完了しました');</script>";
  }

  include("../parts/header.php");
  include("../parts/sidebar.php");

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
      <div>
        <!-- タイトル -->
        <div class="form-group col-5 mb-3">
          <label for="aboutTitle">タイトル</label>
          <input id="aboutTitle" class="form-control" name="aboutTitle" value="<?php echo h($row['about_title']); ?>"
            required>
        </div>
        <!-- 内容1 -->
        <div class="form-group col-8 mb-3">
          <label for="aboutContent1">内容</label>
          <textarea id="aboutContent1" class="form-control" name="aboutContent1" rows="6" cols="40"
            required><?php echo h($row['about_content1']); ?></textarea>
        </div>
        <!-- 画像 -->
        <div class="form-group col-5 mb-3">
          <label for="aboutImg">挿入画像</label>
          <div class="custom-file">
           <input id="aboutImg" name="aboutImg" value="<?php echo h($row['about_img']); ?>">
          </div>
        </div>
        <!-- 内容2 -->
        <div class="form-group col-8 mb-3">
          <label for="aboutContent2">内容</label>
          <textarea id="aboutContent2" class="form-control" name="aboutContent2" rows="6" cols="40"
            required><?php echo h($row['about_content2']); ?></textarea>
        </div>
      </div>
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