<?php 
   include("../parts/escape.php");
   include("../parts/db.php");

$images = glob('../../img/*');


$dir="../../img/";
//チェックされたファイル名を取得
$deletefile=$_POST["deleteImg"];
//ファイルが実際に存在していた場合にunlink関数で画像ファイルを削除する

if(!empty($deletefile)){
  if(file_exists($dir.$deletefile)){
      unlink($dir.$deletefile);
      echo "<script>alert('削除が完了しました');</script>";
      header('Location:img.php');
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
              <h1 class="m-0">管理者ID</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
            <div class="imgMain">
              <?php for($i=0 ;$i<count($images);$i++): ?>
              <div class="images">
                <img class="image" src="<?php echo $images[$i];?>">
                <button class="imgBtn" type="button" data-toggle="modal" data-target="#exampleModal"  onclick="deleteIbent(`<?php  echo basename( $images[$i]);?>`)">
                <input type="hidden" id="<?php  echo basename( $images[$i]);?>" value="<?php  echo basename( $images[$i]);?>">
                <?php  echo basename( $images[$i]);?>
                </button>
              </div>
              <?php endfor ?>
            </div>
        </div>
        
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
  </div>

  <?php
   include("../main/footer.php");
?>


<!-- Modal -->
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">削除</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="deleteModal"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">いいえ</button>
        <form action="" method="post">
           <button type="submit" class="btn btn-primary">はい
              <input input type="hidden" id="deleteImg" name="deleteImg">     
           </button>
        </form>
      </div>
    </div>
  </div>
</div>