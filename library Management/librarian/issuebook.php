<?php 
require_once 'l_header.php';
if(isset($_POST['issue_book'])){                           
	$student_id=$_POST['student_id'];
	$book_id=$_POST['book_id'];
	$book_issue_date=$_POST['book_issue_date'];
	$result=mysqli_query($con,"INSERT INTO issue_books (student_id, book_id, book_issue_date) values ('$student_id','$book_id','$book_issue_date')");
	
	if($result){
		mysqli_query($con,"update books set available_qty=available_qty-1 where id='$book_id'");
		?>
		<script type="text/javascript"> 
		alert('Book issued successfully !');
		</script>
	   <?php
	}else{
		?>
		<script type="text/javascript"> 
		alert('Book not issue');
		</script>
		<?php
	}
}

?>               <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                             <li><a href="javascript: avoid(0)">Issue Books</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
				     <div class="col-sm-6 col-sm-offset-3" style="background-color:white;"> 
					
					<div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-inline" method="post">
                                       
                                        <div class="form-group">
										
                                           <select class="form-control" name="student_id"> 
										     <option value="">Select</option>
											 <?php
									 $result= mysqli_query($con, "select * from students where status='1'");
									 while($row=mysqli_fetch_assoc($result)){?>
									    <option value="<?=$row['id']?>"><?=ucwords($row['firstname']." ".$row['lastname']).' - ( '.$row['roll'].' )'?></option>
										<?php 
									     }
										 ?>
										  
										   </select> 
                                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <button type="submit" name="search" class="btn btn-primary">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
							<?php 
							if(isset($_POST['search'])){
								  $id=$_POST['student_id'];
								  $result= mysqli_query($con, "select * from students where id='$id' AND status='1'");
								  $row=mysqli_fetch_assoc($result);
								 ?>
								 
						<div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="post">
                                      
                                        <div class="form-group">
                                            <label for="name">Student Name</label>
                                            <input type="text" class="form-control" name="student_id" value="<?=ucwords($row['firstname']." ".$row['lastname'])?>" readonly >
											<input type="hidden" value="<?=$row['id'] ?>" name="student_id" />
                                        </div>
										
										  <div class="form-group">
										   <label>Book_Name</label>
                                           <select class="form-control" name="book_id"> 
										     <option value="">Select</option>
											 <?php
									     $result= mysqli_query($con, "select * from books where available_qty>0");
									    while($row=mysqli_fetch_assoc($result)){?>
									    <option value="<?=$row['id']?>"><?=$row['book_name']?></option>
										<?php 
									     }
										 ?>
										  
										   </select> 
                                            
                                        </div>
										<div class="form-group">
										   <label>Issue Date</label>
										   <input type="text" class="form-control" name="book_issue_date" value="<?=date('d-M-Y')?>" readonly />
										 </div> 
                                        
                                        <div class="form-group">
                                            <button type="submit" name="issue_book" class="btn btn-primary">save issue book</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
								 
								 <?php
							}
							?>
                        </div> 
					
					 </div>
                 </div>  
      
     <?php 
	 require_once 'l_footer.php';
	 ?>