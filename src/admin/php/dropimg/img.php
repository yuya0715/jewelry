<?php 
 include("../main/escape.php");
 include("../main/db.php");
 include("../main/header.php");


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
?>


<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <span class="brand-link brand-text font-weight-light">管理者ページ</span>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
              <a href="../../index.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>TOP</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>About</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="news.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>NEWS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="brand.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Brand</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="drop.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>画像挿入</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="img.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>画像一覧</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

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