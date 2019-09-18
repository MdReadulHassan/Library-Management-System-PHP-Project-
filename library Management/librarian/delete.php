<?php
require_once '../dbcon.php';
if(isset($_GET['bookdelete'])){
	$id=base64_decode($_GET['bookdelete']);
	mysqli_query($con,"DELETE FROM books where id='$id'");
	header('location: managebook.php');
}

?>