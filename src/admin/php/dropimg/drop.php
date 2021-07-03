<?php 
include("../parts/escape.php");
include("../parts/db.php");


 if (!empty($_FILES)) {
    $files = [];
    $MAXS = count($_FILES["up"]["tmp_name"] ?? []);
    for ($i=0,$j=0; $i < $MAXS; $i++) {
        $size     = $_FILES["up"]["size"][$i]     ?? ""; //元ファイルのサイズ
        $tmp_file = $_FILES["up"]["tmp_name"][$i] ?? ""; //保存されたファイルの絶対パス
        $org_file = $_FILES["up"]["name"][$i]     ?? ""; //元ファイルのファイル名
        if ($tmp_file != "" && $org_file != "" && 0 < $size &&       $size < 10048576 &&
     is_uploaded_file($tmp_file)) {
            $split = explode('.', $org_file);
            $ext = end($split);
            if ($ext != "" && $ext != $org_file) {
                $up_file = "../../img/".date("YmdHi").$i.mt_rand(10,99).".$ext" ; //ファイル名、.$extは拡張子
                if (move_uploaded_file($tmp_file, $up_file)) {
                    $files[$j++] = array('size' => $size, 'up_file'  => $up_file,
                    'tmp_file' => $tmp_file, 'org_file' => $org_file);
                }
            }
        }
    }                
    echo "<script>alert('アップロードしました');</script>";
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
                            <h1 class="m-0">画像アップロード</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <form action="drop.php" method="post" enctype="multipart/form-data">
                    <div id="drop-zone" style="border: 1px solid; padding: 30px;">
                        <p>ファイルをドラッグ＆ドロップもしくは</p>
                        <input type="file" name="up[]" id="file-input" multiple>
                    </div>
                    <div>アップロードした画像</div>
                    <div id="preview">
 
                    </div>
                    <input type="submit"  style="margin-top: 10px">
                </form>
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
 include("../parts/footer.php");

?>