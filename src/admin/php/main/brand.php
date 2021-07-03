<?php
include("../parts/escape.php");
include("../parts/db.php");

$images = glob('../../img/*');

$brandId= filter_input(INPUT_POST, 'brandId');
session_start();
$flag = filter_input(INPUT_POST, 'flag');


//画像挿入
if($flag === 'editing'){
  $brandName = filter_input(INPUT_POST, 'modalName');
  $brandAddress = filter_input(INPUT_POST, 'modalAddress');
  $brandTopImage = filter_input(INPUT_POST, 'modalTopImage');
  $brandTitle1 = filter_input(INPUT_POST, 'modalTitle1');
  $brandContent1 = filter_input(INPUT_POST, 'modalContent1');
  $brandImage1 = filter_input(INPUT_POST, 'modalImage1');
  $brandTitle2 = filter_input(INPUT_POST, 'modalTitle2');
  $brandContent2 = filter_input(INPUT_POST, 'modalContent2');
  $brandImage2 = filter_input(INPUT_POST, 'modalImage2');
}




// 編集画面に遷移
if (!empty($brandId) && $flag === 'update') {

  try {
      $stmt5 =  $dbh->prepare("SELECT * FROM brand_table WHERE brand_id = :brand_id");
      $stmt5->bindValue(':brand_id', $brandId, PDO::PARAM_STR);
      $stmt5->execute();
      $row5 = $stmt5->fetch(PDO::FETCH_ASSOC);

  } 
  catch(PDOException $e) {
      exit($e);
  }

      $brandName = $row5['brand_name'];
      $brandAddress = $row5['brand_address'];
      $brandTopImage = $row5['brand_top_image'];
      $brandTitle1 = $row5['brand_block1_title'];
      $brandContent1 = $row5['brand_block1_content'];
      $brandImage1 = $row5['brand_block1_image'];
      $brandTitle2 = $row5['brand_block2_title'];
      $brandContent2 = $row5['brand_block2_content'];
      $brandImage2 = $row5['brand_block2_image'];
}
 
// 公開 or 一時保存
if ($flag === 'open'|| $flag === 'close') {

      $brandName = filter_input(INPUT_POST, 'brandName');
      $brandAddress = filter_input(INPUT_POST, 'brandAddress');
      $brandTopImage = filter_input(INPUT_POST, 'brandTopImage');
      $brandTitle1 = filter_input(INPUT_POST, 'brandTitle1');
      $brandContent1 = filter_input(INPUT_POST, 'brandContent1');
      $brandImage1 = filter_input(INPUT_POST, 'brandImage1');
      $brandTitle2 = filter_input(INPUT_POST, 'brandTitle2');
      $brandContent2 = filter_input(INPUT_POST, 'brandContent2');
      $brandImage2 = filter_input(INPUT_POST, 'brandImage2');
      $timestamp = date("Ymd");

  // insert
  if (empty($brandId)&& $_SESSION["flag"] ==="new"||empty($brandId)&& $_SESSION["flag"] ==="editing") {
        $brandId = strval(mt_rand(1000000000, 9999999999));

        try {
            $stmt = $dbh->prepare("
            INSERT INTO
              brand_table(
                brand_id,
                brand_name,
                brand_address,
                brand_top_image,
                brand_block1_title,
                brand_block1_content,
                brand_block1_image,
                brand_block2_title,
                brand_block2_content,
                brand_block2_image,
                timestamp,
                brand_flag
                )
              VALUES(
                :brand_id,
                :brand_name,
                :brand_address,
                :brand_top_image,
                :brand_block1_title,
                :brand_block1_content,
                :brand_block1_image,
                :brand_block2_title,
                :brand_block2_content,
                :brand_block2_image,
                :timestamp,
                :brand_flag
                )
            ");

              $stmt->bindValue(':brand_id', $brandId, PDO::PARAM_STR);
              $stmt->bindValue(':brand_name', $brandName, PDO::PARAM_STR);
              $stmt->bindValue(':brand_address', $brandAddress, PDO::PARAM_STR);
              $stmt->bindValue(':brand_top_image', $brandTopImage, PDO::PARAM_STR);
              $stmt->bindValue(':brand_block1_title', $brandTitle1, PDO::PARAM_STR);
              $stmt->bindValue(':brand_block1_content', $brandContent1, PDO::PARAM_STR);
              $stmt->bindValue(':brand_block1_image', $brandImage1, PDO::PARAM_STR);
              $stmt->bindValue(':brand_block2_title', $brandTitle2, PDO::PARAM_STR);
              $stmt->bindValue(':brand_block2_content', $brandContent2, PDO::PARAM_STR);
              $stmt->bindValue(':brand_block2_image', $brandImage2, PDO::PARAM_STR);
              $stmt->bindValue(':timestamp', $timestamp, PDO::PARAM_STR);
              $stmt->bindValue(':brand_flag', $flag, PDO::PARAM_STR);
              $stmt->execute();

            if ($flag === 'open') {
                echo "<script>alert('公開しました');</script>";
            } elseif ($flag === 'close') {
                echo "<script>alert('一時保存しました');</script>";
            }

            $flag = '';

        } catch (PDOException $e) {
            exit($e);
        }
 }
  // update
  elseif(!empty($brandId) && $_SESSION["flag"] ==="update"||!empty($brandId) && $_SESSION["flag"] ==="editing") {

        try {
            $stmt2 = $dbh->prepare("
            UPDATE
              brand_table
            SET
              brand_id = :brand_id,
              brand_name = :brand_name,
              brand_address = :brand_address,
              brand_top_image = :brand_top_image,
              brand_block1_title = :brand_block1_title,
              brand_block1_content = :brand_block1_content,
              brand_block1_image = :brand_block1_image,
              brand_block2_title = :brand_block2_title,
              brand_block2_content = :brand_block2_content,
              brand_block2_image = :brand_block2_image,
              timestamp = :timestamp,
              brand_flag = :brand_flag
            WHERE
              brand_id = :brand_id
            ");

            $stmt2->bindValue(':brand_id', $brandId, PDO::PARAM_STR);
            $stmt2->bindValue(':brand_name', $brandName, PDO::PARAM_STR);
            $stmt2->bindValue(':brand_address', $brandAddress, PDO::PARAM_STR);
            $stmt2->bindValue(':brand_top_image', $brandTopImage, PDO::PARAM_STR);
            $stmt2->bindValue(':brand_block1_title', $brandTitle1, PDO::PARAM_STR);
            $stmt2->bindValue(':brand_block1_content', $brandContent1, PDO::PARAM_STR);
            $stmt2->bindValue(':brand_block1_image', $brandImage1, PDO::PARAM_STR);
            $stmt2->bindValue(':brand_block2_title', $brandTitle2, PDO::PARAM_STR);
            $stmt2->bindValue(':brand_block2_content', $brandContent2, PDO::PARAM_STR);
            $stmt2->bindValue(':brand_block2_image', $brandImage2, PDO::PARAM_STR);
            $stmt2->bindValue(':timestamp', $timestamp, PDO::PARAM_STR);
            $stmt2->bindValue(':brand_flag', $flag, PDO::PARAM_STR);
            $stmt2->execute();

            if ($flag === 'open') {
                echo "<script>alert('更新し、公開しました');</script>";
            } elseif ($flag === 'close') {
                echo "<script>alert('更新し、一時保存しました');</script>";
            }

            $flag = '';

        } catch (PDOException $e) {
            exit($e);
        }
   }
}

// 削除
if ($flag === 'delete' && $_SESSION["flag"] ==="update") {

  try {
    $stmt3 = $dbh->prepare("DELETE FROM brand_table WHERE brand_id = :brand_id");
    $stmt3->bindValue(':brand_id', $brandId, PDO::PARAM_STR);
    $stmt3->execute();
    echo  "<script>alert('削除が完了しました');</script>";
    $status = '';
  } catch (PDOException $e) {
    exit($e);
  }
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
          <h1 class="m-0">Brand</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <?php
  // new or update
  if ($flag === 'new' || $flag === 'update' || $flag === 'editing') :
  ?>
  <!-- Main content -->
  <div class="container">
    <form id="form" action="" method="post" enctype="multipart/form-data">
      <div>
        <!-- 企業名 -->
        <div class="form-group col-5 mb-3">
          <label for="brandname">企業名</label>
          <input id="brandName" class="form-control" name="brandName" value="<?php echo h($brandName); ?>">
          <input type="hidden" id="brandId" name="brandId" value="<?php echo h($brandId); ?>">
        </div>

        <!--所在地 -->
        <div class="form-group col-5 mb-3">
          <label for="brandaddress">所在地</label>
          <input id="brandAddress" class="form-control" name="brandAddress" value="<?php echo h($brandAddress); ?>">
        </div>

        <!-- トップ画像 -->
        <div class="form-group col-5 mb-3">
          <label for="brandtopimage">トップ画像</label>
          <button type="button" class="btn btn-primary font" data-bs-toggle="modal" data-bs-target="#topimageModal" onclick="brandtopmodal()">画像を選択</button>
          <input type="hidden" id="brandTopImage" name="brandTopImage" value="<?php echo h($brandTopImage); ?>">
          <?php if (!empty($brandTopImage) ) : ?>
             <img class="image" src="../../img/<?php echo h($brandTopImage); ?>">    
             <?php endif; ?>
        </div>

        <!--タイトル１-->
        <div class="form-group col-5 mb-3">
          <label for="brandtitle1">タイトル１</label>
          <input id="brandTitle1" class="form-control" name="brandTitle1" value="<?php echo h($brandTitle1); ?>">
        </div>

        <!-- 内容1 -->
        <div class="form-group col-8 mb-3">
          <label for="brandcontent1">内容１</label>
          <textarea id="brandContent1" class="form-control" name="brandContent1" rows="6"
            cols="40"><?php echo h($brandContent1); ?></textarea>
        </div>

        <!-- 画像1 -->
        <div class="form-group col-5 mb-3">
          <label for="brandimage1">挿入画像1</label>
          <button type="button" class="btn btn-primary font" data-bs-toggle="modal" data-bs-target="#image1Modal" onclick="brand1modal()">画像を選択</button>
          <input type="hidden" id="brandImage1" name="brandImage1" value="<?php echo h($brandImage1); ?>">
          <?php if (!empty($brandImage1)) : ?>
             <img class="image" src="../../img/<?php echo h($brandImage1); ?>">    
          <?php endif; ?>
        </div>

        <!--タイトル２-->
        <div class="form-group col-5 mb-3">
          <label for="brandtitle2">タイトル2</label>
          <input id="brandTitle2" class="form-control" name="brandTitle2" value="<?php echo h($brandTitle2); ?>">
        </div>

        <!-- 内容２ -->
        <div class="form-group col-8 mb-3">
          <label for="brandcontent2">内容２</label>
          <textarea id="brandContent2" class="form-control" name="brandContent2" rows="6"
            cols="40"><?php echo h($brandContent2); ?></textarea>
        </div>

        <!-- 画像２ -->
        <div class="form-group col-5 mb-3">
          <label for="brandimage2">挿入画像２</label>
          <button type="button" class="btn btn-primary font" data-bs-toggle="modal" data-bs-target="#image2Modal" onclick="brand2modal()">画像を選択</button>
          <input type="hidden" id="brandImage2" name="brandImage2" value="<?php echo h($brandImage2); ?>">
          <?php if (!empty($brandImage2)) : ?>
             <img class="image" src="../../img/<?php echo h($brandImage2); ?>">    
          <?php endif; ?>
        </div>

        <!-- 編集の時のボタン -->
        <button class="btn btn-outline-primary mr-2" type="submit" name="flag" value="open">公開</button>
        <button class="btn btn-outline-success mr-2" type="submit" name="flag" value="close">一時保存・非公開</button>
        <button class="btn btn-outline-secondary mr-2" type="submit" name="flag" value="back">戻る</button>
        <?php if ($flag === 'update') : ?>
        <button class="btn btn-outline-danger mr-2" type="submit" name="flag" value="delete"
          onClick="return window.confirm('本当に削除してよろしいですか？');">削除
          <input type="hidden" name="brandId" value="<?php echo h($brandId); ?>">
        </button>
        <?php endif; ?>
      </div>
    </form>
  </div>
  <!-- /.content -->
  <?php
  // display all
  else:
  ?>
  <!-- Main content -->
  <div class="content">
    <div class="row">
      <form action="" method="post">
        <button type="submit" name="flag" value="new">新規工房作成</button>
      </form>
      <form action="" method="post">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>工房名</th>
              <th>住　所</th>
              <th>トップ画像</th>
              <th>更新日</th>
              <th>状態</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $sth4 =  $dbh->prepare("SELECT * FROM brand_table");
              $sth4->execute();
              while ($row4 = $sth4->fetch(PDO::FETCH_ASSOC)) :
              ?>
            <tr>
              <td><?php echo h($row4['brand_name']); ?></td>
              <td><?php echo h($row4['brand_address']); ?></td>
              <td>
                  <?php if (!empty($row4['brand_top_image'])) : ?>
                    <img class="image" src="../../img/<?php echo h($row4['brand_top_image']);?>">
                  <?php endif; ?>  
              </td>
              <td><?php echo h($row4['timestamp']); ?></td>
              <td>
                  <?php if($row4['brand_flag']==="close"){
                    echo "非公開";
                  }elseif($row4['brand_flag']==="open"){
                    echo "公開中";
                    } ?>
              </td>
              <td>
                <form id="form" action="" method="post" enctype="multipart/form-data">
                  <button type="submit" class="btn btn-primary" name="flag" value="update">編集する
                    <input type="hidden" name="brandId" value="<?php echo h($row4['brand_id']); ?>">
                  </button>
                </form>
              </td>
            </tr>
            <?php endwhile;?>
          </tbody>
        </table>
      </form>
    </div>
  </div>
  <?php
  endif;
  ?>
</div>
<!-- /.content-wrapper -->


<!-- topimage Modal -->
<div class="modal fade" id="topimageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-width">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="imageModalLabel">Photo View</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post">
          <div class="modal-body">
            <div class="imgMain">
              <?php
              for($i=0 ;$i<count($images);$i++):
              ?>
              <div class="images">
                <input type="radio" name="modalTopImage" value="<?php  echo basename( $images[$i]);?>">
                <img class="image" src="<?php echo $images[$i];?>">
                </button>
              </div>
              <?php
              endfor;
              ?>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"  name="flag" value="editing">Save changes
            <input type="hidden" id="modalId" name="brandId" >
            <input type="hidden" id="modalName" name="modalName">
            <input type="hidden" id="modalAddress" name="modalAddress">
            <!-- <input type="hidden" id="modalTopImage" name="modalTopImage"> -->
            <input type="hidden" id="modalTitle1" name="modalTitle1">
            <input type="hidden" id="modalContent1" name="modalContent1">
            <input type="hidden" id="modalImage1" name="modalImage1">
            <input type="hidden" id="modalTitle2" name="modalTitle2">
            <input type="hidden" id="modalContent2" name="modalContent2">
            <input type="hidden" id="modalImage2" name="modalImage2">
            </button> 
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<!-- image1 Modal -->
<div class="modal fade" id="image1Modal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-width">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="imageModalLabel">Photo View</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post">
          <div class="modal-body">
            <div class="imgMain">
              <?php
              for($i=0 ;$i<count($images);$i++):
              ?>
              <div class="images">
                <input type="radio" name="modalImage1" value="<?php  echo basename( $images[$i]);?>">
                <img class="image" src="<?php echo $images[$i];?>">
                </button>
              </div>
              <?php
              endfor;
              ?>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"  name="flag" value="editing">Save changes
            <input type="hidden" id="modal1Id" name="brandId" >
            <input type="hidden" id="modal1Name" name="modalName">
            <input type="hidden" id="modal1Address" name="modalAddress">
            <input type="hidden" id="modal1TopImage" name="modalTopImage">
            <input type="hidden" id="modal1Title1" name="modalTitle1">
            <input type="hidden" id="modal1Content1" name="modalContent1">
            <!-- <input type="hidden" id="modalImage1" name="modalImage1"> -->
            <input type="hidden" id="modal1Title2" name="modalTitle2">
            <input type="hidden" id="modal1Content2" name="modalContent2">
            <input type="hidden" id="modal1Image2" name="modalImage2">
            </button> 
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<!-- image2 Modal -->
<div class="modal fade" id="image2Modal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-width">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="imageModalLabel">Photo View</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post">
          <div class="modal-body">
            <div class="imgMain">
              <?php
              for($i=0 ;$i<count($images);$i++):
              ?>
              <div class="images">
                <input type="radio" name="modalImage2" value="<?php  echo basename( $images[$i]);?>">
                <img class="image" src="<?php echo $images[$i];?>">
                </button>
              </div>
              <?php
              endfor;
              ?>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"  name="flag" value="editing">Save changes
            <input type="hidden" id="modal2Id" name="brandId" >
            <input type="hidden" id="modal2Name" name="modalName">
            <input type="hidden" id="modal2Address" name="modalAddress">
            <input type="hidden" id="modal2TopImage" name="modalTopImage">
            <input type="hidden" id="modal2Title1" name="modalTitle1">
            <input type="hidden" id="modal2Content1" name="modalContent1">
            <input type="hidden" id="modal2Image1" name="modalImage1">
            <input type="hidden" id="modal2Title2" name="modalTitle2">
            <input type="hidden" id="modal2Content2" name="modalContent2">
            <!-- <input type="hidden" id="modalImage2" name="modalImage2"> -->
            </button> 
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<!-- footer area -->
<?php
$_SESSION["flag"] = $flag;
include("../parts/footer.php");
?>