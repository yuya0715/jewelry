<?php
include("../parts/escape.php");
include("../parts/db.php");

$edit = filter_input(INPUT_POST, 'edit');

try {
  $stmt = $dbh->prepare("SELECT * FROM contact_table ORDER BY contact_date DESC");
  $stmt2 = $dbh->prepare("SELECT * FROM admin_table WHERE main_flag = :main_flag");

  $stmt2->bindValue(':main_flag', 1);

  $stmt->execute();
  $stmt2->execute();

} catch (PDOException $e) {
  exit($e);
}

$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

/************************
*メール送信
*************************/
if($edit === 'reply') {

  $send_to = filter_input(INPUT_POST, 'mail');
  $subject = filter_input(INPUT_POST, 'subject');
  $message = filter_input(INPUT_POST, 'message');

  // 言語・文字コードを指定
  mb_language( 'Japanese' );
  mb_internal_encoding( 'UTF-8' );

  $headers = [
    'MIME-Version' => '1.0',
    'Content-Transfer-Encoding' => '7bit',
    'Content-Type' => 'text/plain; charset=UTF-8',
    'Return-Path' => $row2['admin_mail'], //メールが届かなかった場合に、そのメールが送り返される返信先のメールアドレス
    'From' => mb_encode_mimeheader($row2['admin_name']) . '<' . $row2['admin_mail'] .'>', //送信元メールアドレス
    'Sender' => mb_encode_mimeheader($row2['admin_name']) . '<' . $row2['admin_mail'] .'>', //送信元メールアドレス
    'Reply-To' => $send_to //返信先のメールアドレス
    // 'Organization' => 'OrganizationName', //送信者が所属する組織名
  ];

  // $add_params = '-f'. $row2['admin_mail'];

  // 送信する
  mb_send_mail($send_to, $subject, $message, $headers);

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
              <input type="hidden" id="contactIdHdn<?= h($i); ?>" value="<?= h($row['contact_id']); ?>">
              <input type="hidden" id="contactTitleHdn<?= h($i); ?>" value="<?= h($row['contact_title']); ?>">
              <input type="hidden" id="contactDetailHdn<?= h($i); ?>" value="<?= h($row['contact_detail']); ?>">
              <input type="hidden" id="contactStatusHdn<?= h($i); ?>" value="<?= h($row['contact_status']); ?>">
              <input type="hidden" id="contactMailHdn<?= h($i); ?>" value="<?= h($row['contact_mail']); ?>">
              <input type="hidden" id="contactNameHdn<?= h($i); ?>" value="<?= h($row['contact_name']); ?>">
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

<!-- footer area -->
<?php
include("../parts/footer.php");
?>


<!-----------------
modal area
------------------->
<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <form action="./contact.php" method="post" onsubmit="return confirm_mail()">
        <!-- modal header -->
        <div class="modal-header">
          <h5 class="modal-title" id="contactModalLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- modal body -->
        <div class="modal-body">
          <div class="mb-3">
            <label for="contactModalEmail" class="col-form-label">宛先：</label>
            <input type="text" class="form-control-plaintext" id="contactModalEmail" name="mail" readonly>
          </div>
          <div class="mb-3">
            <label for="contactModalTitle" class="col-form-label">問い合わせ項目：</label>
            <textarea class="form-control-plaintext" id="contactModalTitle" readonly></textarea>
          </div>
          <div class="mb-3">
            <label for="contactModalContent" class="col-form-label">問い合わせ内容：</label>
            <textarea name="" id="contactModalContent" class="w-100 form-control-plaintext" readonly></textarea>
          </div>
          <div class="mb-3">
            <label for="contactModalReply" class="col-form-label">返信タイトル：</label>
            <input type="text" class="form-control" id="contactModalSubject" name="subject">
          </div>
          <div class="mb-3">
            <label for="contactModalReply" class="col-form-label">返信内容：</label>
            <textarea name="message" id="contactModalReply" rows="10" class="w-100 form-control"></textarea>
          </div>
        </div>
        <!-- modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
          <button type="submit" class="btn btn-primary" name="edit" value="reply">返信する</button>
        </div>
      </form>
    </div>
  </div>
</div>
