<?php session_start();
session_destroy();
$response = array('redirect' => 'inde.php');
echo json_encode($response);
?>
<!-- <meta http-equiv="refresh" content="3; url=login.php" /> -->