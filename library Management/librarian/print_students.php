<?php 
require_once '../dbcon.php';
$result=mysqli_query($con,"select *from students");
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Print All Students</title>
	<style type="text/css"> 
	body{
		margin:0;
		font-family:kalpurush;
	}
	.print-area{
		width:750px;
		height:1050px;
		margin:auto;
		box-sizing:border-box;
		page-break-after:always;
	}
	.header,.page-info{
		text-align:center;
	}
	.header h3{
		margin:0;
	}
	.data-info{
		
	}
	.data-info table{ 
	width:100%;
	border-collapse:collapse;
	}
	.data-info table th,.data-info table td{
		border:1px solid black;
		padding: 4px;
		line-height: 1em;
	}
	</style>
</head>
<body onload="window.print();">
	<?php
	$sl=1;
	$page=1;
	$per_page=6;
	$total=mysqli_num_rows($result);
	while($row=mysqli_fetch_assoc($result)){
		if($sl%$per_page==1){
		echo page_header();
	}
     		?>
	
	<tr> 
	  <td><?=$sl ?></td>
	  <td><?=$row['firstname']?></td>
	  <td><?=$row['lastname']?></td>
	  <td><?=$row['username']?></td>
	  <td><?=$row['phone'] ?></td>
	  <td><?=$row['email'] ?></td>
	</tr>
	<?php 
	if($sl%$per_page==0 || $total==$per_page){
		echo page_footer($page++);
	}
	$sl++;
	} ?>
		
</body>
</html>
<?php
function page_header(){
	$data='  
	<div class="print-area"> 
	<div class="header"> 
	<h3>smart soft it</h3>
	</div>
	<div class="data-info"> 
	<table> 
	<tr> 
	    <th> Sl NO</th>
		<th>First name</th>
		<th>Last Name</th>
		<th>User Name</th>
		<th>Phone</th>
		<th>Email</th>
	</tr>
	';
	return $data;
}
function page_footer($page){
	$data='  
	</table>
	</div>
	<div class="page-info">page:'.$page.'</div>
	
	</div>
	';
	return $data;
}
?>