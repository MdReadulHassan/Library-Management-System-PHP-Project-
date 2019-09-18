<?php
 require_once '../dbcon.php';

  $id=base64_decode($_GET['id']);
  
  mysqli_query($con, "UPDATE students SET status='1' where id='$id'");
  header('location: students.php');
?>