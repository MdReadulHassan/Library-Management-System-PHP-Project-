<?php 
require_once 'l_header.php';
if(isset($_POST['save'])){
	$book_name=$_POST['book_name'];
	$book_image=explode('.',$_FILES['book_image']['name']);
	$image_ext=end($book_image);
	$image=date('ymdhis.').$image_ext;
	$author_name=$_POST['author_name'];
	$publication=$_POST['publication'];
	$purchase_date=$_POST['purchase_date'];
	$price=$_POST['price'];
	$book_qty=$_POST['book_qty'];
	$available_qty=$_POST['available_qty'];
	
	$librarian_username=$_SESSION['librarian_username'];
	
	
	$insert="INSERT INTO `books`(`book_name`, `book_image`, `author_name`, `publication`, `purchase_date`, `price`, `book_qty`, `available_qty`, `librarian_username`) VALUES('$book_name','$image','$author_name','$publication','$purchase_date','$price','$book_qty','$available_qty','$librarian_username')";
   $result=mysqli_query($con,$insert);
   if($result){
	   move_uploaded_file($_FILES['book_image']['tmp_name'], '../images/books/'.$image);
	   $success="Information are saved successfully !";
   }else{
	   $error="information are not saved successfully !";
   }
}

?>
           <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="l_index.php">Dashboard</a></li>
                            <li><a href="javascript: avoid(0)"></a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
				     <div class="col-sm-6 col-sm-offset-3"> 
					 
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
					 
					 
					 <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                        <h5 class="mb-lg">Add Book</h5>
                                        <div class="form-group">
                                            <label for="book_name" class="col-sm-2 control-label">book_name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="book_name" placeholder="book_name" required>
                                            </div>
                                        </div>
										
										 <div class="form-group">
                                            <label for="book_image" class="col-sm-2 control-label">Book_image</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="book_image" placeholder="book_image" required>
                                            </div>
                                        </div>
										
										 <div class="form-group">
                                            <label for="author_name" class="col-sm-2 control-label">Author_name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="author_name" placeholder="author_name" required>
                                            </div>
                                        </div>
										
										 <div class="form-group">
                                            <label for="publication" class="col-sm-2 control-label">Publication</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="publication" placeholder="publication" required>
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label for="purchase_date" class="col-sm-2 control-label">Purchase_date</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="purchase_date" placeholder="purchase_date" required>
                                            </div>
                                        </div>
										
										 <div class="form-group">
                                            <label for="price" class="col-sm-2 control-label">Price</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="price" placeholder="price" required>
                                            </div>
                                        </div>
										
										 <div class="form-group">
                                            <label for="book_qty" class="col-sm-2 control-label">Book_qty</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="book_qty" placeholder="book_qty" required>
                                            </div>
                                        </div>
										
										 <div class="form-group">
                                            <label for="available_qty" class="col-sm-2 control-label">Available_qty</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="available_qty" placeholder="available_qty" required>
                                            </div>
                                        </div>
                                        

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" name="save" class="btn btn-primary"><i class="fa fa-save"></i>Save Book</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
					 
					 </div>
                 </div>  
      
     <?php 
	 require_once 'l_footer.php';
	 ?>