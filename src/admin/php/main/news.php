<?php
include("../parts/escape.php");
include("../parts/db.php");

$images = glob('../../img/*');


$newsId = filter_input(INPUT_POST, 'newsId');
session_start();
$status = filter_input(INPUT_POST, 'newsStatus');


//画像挿入
if($status === 'editing'){
  $postImage  = filter_input(INPUT_POST,'image');
  $postDate = filter_input(INPUT_POST, 'modalDate');
  $postTitle = filter_input(INPUT_POST, 'modalTitle');
  $postText = filter_input(INPUT_POST, 'modalText');
}

// 編集画面に遷移
if (!empty($newsId) && $status === 'update') {

  try {
    $stmt5 =  $dbh->prepare("SELECT * FROM news_table WHERE news_id = :news_id");
    $stmt5->bindValue(':news_id', $newsId, PDO::PARAM_STR);
    $stmt5->execute();
    $row5 = $stmt5->fetch(PDO::FETCH_ASSOC);

  } catch(PDOException $e) {
    exit($e);
  }


  $newsId = $row5['news_id'];
  $postDate = $row5['news_day'];
  $postTitle = $row5['news_title'];
  $postImage = $row5['news_image'];
  $postText = $row5['news_text'];
  $timestamp = date("YmdHi");

}


  // 投稿 or 保存
 if ($status === 'post' || $status === 'save') {
     $postDate = filter_input(INPUT_POST, 'postDate');
     $postTitle = filter_input(INPUT_POST, 'postTitle');
     $postImage = filter_input(INPUT_POST, 'postImage');
     $postText = filter_input(INPUT_POST, 'postText');
     $timestamp = date("YmdHi");

     // insert
     if (empty($newsId) && $_SESSION["newsStatus"] ==="new" || empty($newsId) && $_SESSION["newsStatus"] ==="editing") {
         $newsId = strval(date("YmdHi")) . strval(mt_rand(10, 99));

         try {
             $stmt = $dbh->prepare("
          INSERT INTO
            news_table(
              news_id,news_day,news_title,news_text,news_image,news_status,news_timestamp)
            VALUES(
              :news_id,:news_day,:news_title,:news_text,:news_image,:news_status,:news_timestamp)
        ");

             $stmt->bindValue(':news_id', $newsId, PDO::PARAM_STR);
             $stmt->bindValue(':news_day', $postDate, PDO::PARAM_STR);
             $stmt->bindValue(':news_title', $postTitle, PDO::PARAM_STR);
             $stmt->bindValue(':news_text', $postText, PDO::PARAM_STR);
             $stmt->bindValue(':news_image', $postImage, PDO::PARAM_STR);
             $stmt->bindValue(':news_status', $status, PDO::PARAM_STR);
             $stmt->bindValue(':news_timestamp', $timestamp, PDO::PARAM_STR);
             $stmt->execute();

             if ($status === 'post') {
                 echo "<script>alert('投稿しました');</script>";
             } elseif ($status === 'save') {
                 echo "<script>alert('保存しました');</script>";
             }
             $status = '';
         } catch (PDOException $e) {
             exit($e);
         }

         // update
     } else if(!empty($newsId) && $_SESSION["newsStatus"] ==="update"|| !empty($newsId)&&$_SESSION["newsStatus"] ==="editing") {
         try {
             $stmt2 = $dbh->prepare("
          UPDATE
            news_table
          SET
            news_day = :news_day,
            news_title = :news_title,
            news_text = :news_text,
            news_image = :news_image,
            news_status = :news_status,
            news_timestamp = :news_timestamp
          WHERE
            news_id = :news_id
        ");

             $stmt2->bindValue(':news_id', $newsId, PDO::PARAM_STR);
             $stmt2->bindValue(':news_day', $postDate, PDO::PARAM_STR);
             $stmt2->bindValue(':news_title', $postTitle, PDO::PARAM_STR);
             $stmt2->bindValue(':news_text', $postText, PDO::PARAM_STR);
             $stmt2->bindValue(':news_image', $postImage, PDO::PARAM_STR);
             $stmt2->bindValue(':news_status', $status, PDO::PARAM_STR);
             $stmt2->bindValue(':news_timestamp', $timestamp, PDO::PARAM_STR);
             $stmt2->execute();

             if ($status === 'post') {
                 echo "<script>alert('更新して投稿しました');</script>";
             } elseif ($status === 'save') {
                 echo "<script>alert('更新して保存しました');</script>";
             }
             $status = '';
         } catch (PDOException $e) {
             exit($e);
         }
     }
}



  // 削除
  if ($status === 'delete' && $_SESSION["newsStatus"] ==="update") {
  try {
    $stmt3 = $dbh->prepare("DELETE FROM news_table WHERE news_id = :news_id");
    $stmt3->bindValue(':news_id', $newsId, PDO::PARAM_STR);
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
          <h1 class="m-0">News</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

    <!-- /.Main content -->
  <?php
  // new or update
  if ($status === 'new' || $status === 'update' || $status === "editing") :
  ?>
    <!-- Main content -->
    <div class="container">
      <form id="form" action="" method="post" enctype="multipart/form-data">
        <div>
          <!-- 投稿日時 -->
          <div class="form-group col-5 mb-3">
            <label for="postDate">投稿日時</label>
            <input class="form-control" id="postDate" type="date" name="postDate"  value="<?php echo h($postDate); ?>">
          </div>
          <!-- タイトル -->
          <div class="form-group col-5 mb-3">
            <label for="postTitle">タイトル</label>
            <input id="postTitle" class="form-control" name="postTitle" value="<?php echo h($postTitle); ?>" >
          </div>
          <!-- 画像 -->
          <div class="form-group col-5 mb-3">
            <label for="postImage">挿入画像</label>
             <button type="button" class="btn btn-primary font" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="modal()">画像を選択</button>
             <input type="hidden" id="postId" name="newsId" value="<?php echo h($newsId); ?>">
             <input type="hidden" id="postImage" name="postImage" value="<?php echo h($postImage); ?>">
             <?php if (!empty($postImage) ) : ?>
             <img class="image" src="../../img/<?php echo h($postImage); ?>">    
             <?php endif; ?>
          </div>
          <!-- 内容 -->
          <div class="form-group col-8 mb-3">
            <label for="postText">内容</label>
            <textarea id="postText" class="form-control" name="postText" rows="6" cols="40" ><?php echo h($postText); ?></textarea>
          </div>
        </div>
        <div class="col-5 mb-3">
        <!-- 編集の時のボタン -->

            <button class="btn btn-outline-primary mr-2" type="submit" name="newsStatus" value="post">投稿</button>
            <button class="btn btn-outline-success mr-2" type="submit" name="newsStatus" value="save">保存</button>
            <button class="btn btn-outline-secondary mr-2" type="submit" name="newsStatus" value="back">戻る</button>
            <?php if ($status === 'update') : ?>
            <button class="btn btn-outline-danger mr-2" type="submit" name="newsStatus" value="delete" onClick="return window.confirm('本当に削除してよろしいですか？');">削除
              <input type="hidden" name="newsId" value="<?php echo h($newsId); ?>">
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
          <button type="submit" name="newsStatus" value="new">新規記事作成</button>
        </form>
        <form action="" method="post">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>日付</th>
                <th>タイトル</th>
                <th>状態</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sth4 =  $dbh->prepare("SELECT * FROM news_table ORDER BY news_day DESC");
              $sth4->execute();
              while ($row4 = $sth4->fetch(PDO::FETCH_ASSOC)) :
              ?>
                <tr>
                  <td><?php echo h($row4['news_day']); ?></td>
                  <td><?php echo h($row4['news_title']); ?></td>
                  <td>
                      <?php if($row4['news_status']==="post"){
                        echo "公開中";
                      }elseif($row4['news_status']==="save"){
                        echo "一時保存中";
                        } ?>
                  </td>
                  <td>
                  <form id="form" action="" method="post" enctype="multipart/form-data">
                    <button type="submit" class="btn btn-primary" name="newsStatus" value="update">編集する
                      <input type="hidden" name="newsId" value="<?php echo h($row4['news_id']); ?>">
                    </button>
                  </form>
                  </td>
                </tr>
              <?php
              endwhile;
              ?>
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





    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
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
                <input type="radio" name="image" value="<?php  echo basename( $images[$i]);?>">
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
            <button type="submit" class="btn btn-primary"  name="newsStatus" value="editing">Save changes
            <input type="hidden" id="modalDate" name="modalDate">
            <input type="hidden" id="modalTitle" name="modalTitle">
            <input type="hidden" id="modalText" name="modalText">
            <input type="hidden" id="modalId" name="newsId" >
            </button> 
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- footer area -->
<?php
$_SESSION["newsStatus"] = $status;
include("../parts/footer.php");
?>