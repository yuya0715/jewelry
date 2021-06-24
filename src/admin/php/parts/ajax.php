<?php
include("./db.php");


$contactStatus = '未返信';
$contactId = filter_input(INPUT_POST, 'contact_id');
var_dump($contactId);

try {
  $stmt = $dbh->prepare("
    UPDATE
      contact_table
    SET
      contact_status = :contact_status
    WHERE
      contact_id = :contact_id
  ");
} catch (PDOException $e) {
  exit($e);
}

$stmt->bindValue(':contact_status', $contactStatus);
$stmt->bindValue(':contact_id', $contactId);
$stmt->execute();

?>
