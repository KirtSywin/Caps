<?php
	require_once '../connection/connect.php';
	$conn->query("DELETE FROM `residentrecords` WHERE `residentId` = '$_REQUEST[residentId]'") or die(mysql_error());
	header("location:../admin/userRecMed.php");
?>