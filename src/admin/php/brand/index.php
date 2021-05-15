<?php 
 include("../main/escape.php");
 include("../main/db.php");
 include("../main/header.php");



$aboutText = filter_input(INPUT_POST, 'aboutText');
$id = filter_input(INPUT_POST, 'id');

if (!empty($aboutText) ) {
  $sql = "UPDATE about_table SET content = :content WHERE id = :id";
$stmt = $dbh->prepare($sql);
$params = array(':content' => $aboutText, ':id' => $id );
$stmt->execute($params);
echo "<script>alert('更新が完了しました');</script>";
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
            <?php 
            $sth =  $dbh->prepare("SELECT * FROM about_table");
            $sth->execute(); 
             while($row = $sth->fetch(PDO::FETCH_ASSOC)) : ?>
             <form action="" method="post">
              <textarea class="aboutText" name="aboutText">
                <?php echo h($row['content']); ?>
              </textarea>
              <input type="hidden" name="id" value="<?php echo h($row['id']); ?>" >
            <?php  endwhile; ?>
              <div>
                <button type="submit" id="insert">修正</button>
              </div>
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
      <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->


  <?php
   include("../main/footer.php");
?>