<?php 
 include("../main/escape.php");
 include("../main/db.php");
 include("../main/header.php");

 $id = filter_input(INPUT_POST, 'id');

 if(!empty($id)){
  header('Location:edit-news.php?id='.$id);
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

      <div class="container">
        <div class="row">
        <form action="new-news.php" method="post">
            <button type="submit" >
              新規記事作成
            </button>
          </form>
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
             $sth =  $dbh->prepare("SELECT * FROM news_table");
             $sth->execute(); 
             while($row = $sth->fetch(PDO::FETCH_ASSOC)) : ?>
              <tr>
                <td><?php echo h($row['news_day']); ?></td>
                <td><?php echo h($row['news_title']); ?></td>
                <td><?php echo h($row['news_status']); ?></td>
                <form action="" method="post">
                <td><button type="submit" class="btn btn-primary" >
                編集する<input type="hidden" name="id" value="<?php echo h($row['news_id']); ?>"></button></td>
                </form>
              </tr>
              <?php 
              endwhile; ?>
            </tbody>
          </table>
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
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->


  <?php
   include("../main/footer.php");
?>