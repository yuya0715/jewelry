<?php 
 include("../main/escape.php");
 include("../main/db.php");
 include("../main/header.php");



 if (!empty($_FILES)) {
    $files = [];
    $MAXS = count($_FILES["up"]["tmp_name"] ?? []);
    for ($i=0,$j=0; $i < $MAXS; $i++) {
        $size     = $_FILES["up"]["size"][$i]     ?? "";
        $tmp_file = $_FILES["up"]["tmp_name"][$i] ?? "";
        $org_file = $_FILES["up"]["name"][$i]     ?? "";
        if ($tmp_file != "" && $org_file != "" && 0 < $size &&       $size < 1048576 &&
     is_uploaded_file($tmp_file)) {
            $split = explode('.', $org_file);
            $ext = end($split);
            if ($ext != "" && $ext != $org_file) {
                $up_file = "../../img/" .$_FILES['up']['name'][$i] ;
                if (move_uploaded_file($tmp_file, $up_file)) {
                    $files[$j++] = array('size' => $size, 'up_file'  => $up_file,
                    'tmp_file' => $tmp_file, 'org_file' => $org_file);
                }
            }
        }
    }
    echo "<script>alert('アップロードしました');</script>";
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
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
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
            <div class="content">
                <h1>画像アップロード</h1>
                <form action="drop.php" method="post" enctype="multipart/form-data">
                    <div id="drop-zone" style="border: 1px solid; padding: 30px;">
                        <p>ファイルをドラッグ＆ドロップもしくは</p>
                        <input type="file" name="up[]" id="file-input" multiple>
                    </div>
                    <h2>アップロードした画像</h2>
                    <div id="preview" >
 
                    </div>
                    <input type="submit"  style="margin-top: 10px">
                </form>
                <div>
                    <a href="img.php">アップロードした画像一覧へ</a>
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
            <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <script src="../../js/drop.js"></script>
    <?php
   include("../main/footer.php");
?>