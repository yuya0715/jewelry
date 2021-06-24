<?php

  include("../parts/escape.php");
  include("../parts/db.php");

  $images = glob('../../img/*');
  $dir = "../../img/";

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
<div class="content-wrapper bg-white">
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
    $row = $sth->fetch(PDO::FETCH_ASSOC)
    ?>
    <div class="container">
      <form action="" method="post">
        <!-- ラジオボタン -->
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="switchFormat" id="inlineRadio1" value="text" checked>
          <label class="form-check-label" for="inlineRadio1">テキスト</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="switchFormat" id="inlineRadio2" value="html">
          <label class="form-check-label" for="inlineRadio2">HTML</label>
        </div>
        <button type="button" class="btn btn-primary font" data-bs-toggle="modal" data-bs-target="#imageModal">画像を選択</button>

        <div class="border">
          <!-- タイトル -->
          <div class="row">
            <div class="col-3"></div>
            <div class="form-group col-6 mb-3">
              <input id="aboutTitle" class="form-control text-center border-0 border-bottom font" name="aboutTitle" value="<?php echo h($row['about_title']); ?>" required>
            </div>
            <div class="col-3"></div>
          </div>

          <!-- 内容1 -->
          <div class="row">
            <div class="col-2"></div>
            <div class="form-group col-8 mb-3">
              <textarea id="aboutContent1" class="form-control border-0 font" name="aboutContent1" rows="6" cols="40"
                required><?php echo h($row['about_content1']); ?></textarea>
            </div>
            <div class="col-2"></div>
          </div>

          <!-- 画像 -->
          <div class="row">
            <div class="col-2"></div>
            <div class="form-group col-8 mb-3 text-center">
              <div class="custom-file">
                <p><input id="aboutImg" class="text w-100 border-0 text-center" name="aboutImg" value="<?php echo h($row['about_img']); ?>"></p>
              </div>
            </div>
            <div class="col-2"></div>
          </div>

          <!-- 内容2 -->
          <div class="row">
            <div class="col-2"></div>
            <div class="form-group col-8 mb-3">
              <textarea id="aboutContent2" class="form-control border-0 font" name="aboutContent2" rows="15" cols="40" required><?php echo h($row['about_content2']); ?></textarea>
            </div>
            <div class="col-2"></div>
          </div>
        </div>
        <!-- 適用 -->
        <div class="row">
          <div class="col-4"></div>
          <div class="col-4 text-center">
            <button type="submit" id="insert" class="btn btn-success">適用</button>
            <input type="hidden" name="id" value="<?php echo h($row['id']); ?>">
          </div>
          <div class="col-4"></div>
        </div>
      </form>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="imageModalLabel">Photo View</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="imgMain">
              <?php
              for($i=0 ;$i<count($images);$i++):
              ?>
              <div class="images">
                <img class="image" src="<?php echo $images[$i];?>">
                <button class="imgBtn" type="button" data-toggle="modal" data-target="#exampleModal"  onclick="deleteIbent(`<?php  echo basename( $images[$i]);?>`)">
                <input type="hidden" id="<?php  echo basename( $images[$i]);?>" value="<?php  echo basename( $images[$i]);?>">
                <?php  echo basename( $images[$i]);?>
                </button>
              </div>
              <?php
              endfor;
              ?>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content -->

</div>
<!-- /.content-wrapper -->

<!-- footer area -->
<?php
include("../parts/footer.php");
?>
