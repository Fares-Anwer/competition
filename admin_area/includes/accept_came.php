<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/Modern-E-Commerce-Store-master-main/core/init.php');
?>

<?php
if (isset($_GET['enevt_id'])) {
    $enevt_id = $_GET['enevt_id'];

    $sql = "UPDATE  events status = '1' WHERE enevt_id = :enevt_id";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(":enevt_id", $enevt_id);

    if ($stmt->execute()) {
        $_SESSION['status_update_msg'] = "enevt status has been updated to active (1) successfully!";

        header('Location: ../index.php?Unapprove_enevt');
    } else {
        $_SESSION['status_update_msg'] = "Failed to update enevt status!";
        header('Location: ../index.php?Unapprove_enevt');
    }
}
?>
