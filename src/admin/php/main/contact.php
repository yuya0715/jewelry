<?php
include("../parts/escape.php");
include("../parts/db.php");

try {
  $stmt = $dbh->prepare("SELECT * FROM contact_table ORDER BY contact_date DESC");
  $stmt->execute();
} catch (PDOException $e) {
  exit($e);
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
          <h1 class="m-0">Contact</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>受信日時</th>
          <th>ステータス</th>
          <th>お名前</th>
          <th>メールアドレス</th>
          <th>問い合わせ種別</th>
          <th>問い合わせ内容</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
          ?>
          <tr>
            <td><?= h($row['contact_date']); ?></td>
            <td><?= h($row['contact_status']); ?></td>
            <td><?= h($row['contact_name']); ?></td>
            <td><?= h($row['contact_mail']); ?></td>
            <td><?= h($row['contact_title']); ?></td>
            <td>
              <button type="button" id="contactDetail<?= h($i); ?>" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#contactModal" onclick="detailOpen(<?= h($i); ?>)">詳細</button>
              <input type="hidden" id="contactTitleHdn<?= h($i); ?>" value="<?= h($row['contact_title']); ?>">
              <input type="hidden" id="contactDetailHdn<?= h($i); ?>" value="<?= h($row['contact_detail']); ?>">
            </td>
          </tr>
          <?php
          $i++;
        endwhile;
        ?>
      </tbody>
    </table>

  </div>

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="contactModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <textarea name="" id="contactModalContent" cols="30" rows="10"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
        <button type="button" class="btn btn-primary">返信する</button>
      </div>
    </div>
  </div>
</div>

<!-- footer area -->
<?php
include("../parts/footer.php");
?>
