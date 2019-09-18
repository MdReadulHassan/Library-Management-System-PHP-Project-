<?php
require_once '../dbcon.php';

session_start();
if(isset($_SESSION['student_login']))
	 header('location: index.php');

if(isset($_POST['sub'])){
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$roll=$_POST['roll'];
	$reg=$_POST['reg'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$phone=$_POST['phone'];
	
	$input_errors=array();
	
	if(empty($firstname)){
		$input_errors['firstname']="First Name Field is Required";
	}
	if(empty($lastname)){
		$input_errors['lastname']="Last Name Field is Required";
	}
	if(empty($roll)){
		$input_errors['roll']="Roll No is Required";
	}
	if(empty($reg)){
		$input_errors['reg']="Registration No is Required";
	}
	if(empty($email)){
		$input_errors['email']="Email is Required";
	}
	if(empty($username)){
		$input_errors['username']="User Name is Required";
	}
	if(empty($password)){
		$input_errors['password']="Password is Required";
	}
	if(empty($phone)){
		$input_errors['phone']="Phone No is Required";
	}
	if(count($input_errors)==0){
	$email_check=mysqli_query($con,"SELECT * FROM `students` WHERE email='$email'");
	$email_check_row=mysqli_num_rows($email_check);
	if  ($email_check_row==0){
		$username_check=mysqli_query($con,"SELECT * FROM `students` WHERE username='$username'");
	    $username_check_row=mysqli_num_rows($username_check);
		if  ($username_check_row==0){
			if(strlen($username)>7){
			if(strlen($password)>5){
			  //$password_h=password_hash($password, PASSWORD_DEFAULT);
			  $insert="INSERT INTO `students`(`firstname`, `lastname`, `roll`, `reg`, `email`, `username`, `password`, `phone`,`status`) VALUES('$firstname','$lastname','$roll','$reg','$email','$username','$password','$phone','0')";
	          $result=mysqli_query($con,$insert);
	if($result){
		$success="Registration Successfully !";
	}
	else{
		$error="Something wrong!";
	}	
			}else {
		$password_error="password morethan 5 characters ";
	      }	
			}else {
		$username_exist="Username morethan 8 characters ";
	      }
		}else {
		$username_exist="This Username Already Exist";
	}
	}else {
		$email_exist="This Email Already Exist";
	}
	 
	
	}
	
}
?>
<!doctype html>
<html lang="en" class="fixed accounts sign-in">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Library Management System</title>
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= --> 
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <h1 class="text-center">Registration</h1>
			<?php
			if(isset($success)){
			?>
			  <div class="alert alert-success" role="alert">
			  <?=$success ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              </div>
			<?php
			}
			?>
			<?php
			if(isset($error)){
			?>
			  <div class="alert alert-danger" role="alert">
			  <?=$error ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              </div>
			<?php
			}
			?>
			
			<?php
			if(isset($email_exist)){
			?>
			  <div class="alert alert-danger" role="alert">
			  <?=$email_exist ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              </div>
			<?php
			}
			?>
			<?php
			if(isset($username_exist)){
			?>
			  <div class="alert alert-danger" role="alert">
			  <?=$username_exist ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              </div>
			<?php
			}
			?>
			<?php
			if(isset($password_error)){
			?>
			  <div class="alert alert-danger" role="alert">
			  <?=$password_error ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              </div>
			<?php
			}
			?>
		     
        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="firstname" placeholder="First Name" value="<?= isset($firstname) ? $firstname :''?>">
                                <i class="fa fa-user"></i>
                            </span>
							<?php
							if(isset($input_errors['firstname'])){
								echo '<span class="input-error">'.$input_errors['firstname'].'</span>';
							}
							?>
                        </div>
						 <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="<?= isset($lastname) ? $lastname :''?>">
                                <i class="fa fa-user"></i>
                            </span>
							<?php
							if(isset($input_errors['lastname'])){
								echo '<span class="input-error">'.$input_errors['lastname'].'</span>';
							}
							?>
                        </div>
						<div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="roll" placeholder="Roll No" pattern="[0-9]{6}" value="<?= isset($roll) ? $roll :''?>">
                                <i class="fa fa-user"></i>
                            </span>
							<?php
							if(isset($input_errors['roll'])){
								echo '<span class="input-error">'.$input_errors['roll'].'</span>';
							}
							?>
                        </div>
						<div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="reg" placeholder="Registration No" pattern="[0-9]{6}" value="<?= isset($reg) ? $reg :''?>">
                                <i class="fa fa-user"></i>
                            </span>
							<?php
							if(isset($input_errors['reg'])){
								echo '<span class="input-error">'.$input_errors['reg'].'</span>';
							}
							?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?= isset($email) ? $email :''?>">
                                <i class="fa fa-envelope"></i>
                            </span>
							<?php
							if(isset($input_errors['email'])){
								echo '<span class="input-error">'.$input_errors['email'].'</span>';
							}
							?>
                        </div>
						<div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="username" placeholder="User Name" value="<?= isset($username) ? $username :''?>">
                                <i class="fa fa-user"></i>
                            </span>
							<?php
							if(isset($input_errors['username'])){
								echo '<span class="input-error">'.$input_errors['username'].'</span>';
							}
							?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <i class="fa fa-key"></i>
                            </span>
							<?php
							if(isset($input_errors['password'])){
								echo '<span class="input-error">'.$input_errors['password'].'</span>';
							}
							?>
                        </div>
						<div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="phone" placeholder="01********" pattern="01[5|6|7|8|9][0-9]{8}" value="<?= isset($phone) ? $phone :''?>">
                                <i class="fa fa-user"></i>
                            </span>
							<?php
							if(isset($input_errors['phone'])){
								echo '<span class="input-error">'.$input_errors['phone'].'</span>';
							}
							?>
                        </div>
                      
                        <div class="form-group">
                            <input class="btn btn-primary btn-block" type="submit" name="sub" value="Register" />
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="signin.php">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script> 
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>


</html>
