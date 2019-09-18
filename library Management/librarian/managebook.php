<?php 
require_once 'l_header.php';
?>
           <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="l_index.php">Dashboard</a></li>
                            <li><a href="javascript: avoid(0)">Manage Books</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
				   
				    <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>All Books </b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Book Name</th>
                                        <th>Book Image</th>
                                        <th>Author Name</th>
                                        <th>Publication</th>
                                        <th>Purchase Date</th>
                                        <th>Price</th>
                                        <th>Book quantity</th>
                                        <th>Avalilable Quantity</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody> 
									<?php
									 $result= mysqli_query($con, "select * from books");
									 while($row=mysqli_fetch_assoc($result)){
										 ?>
										 <tr> 
									        <td><?= $row['book_name']?></td>
									        <td><img style="width:100px;" src="../images/books/<?= $row['book_image']?>" alt="" /></td>
											 <td><?= $row['author_name']?></td>
											 <td><?= $row['publication']?></td>
											 <td><?=date('d-M-Y',strtotime($row['purchase_date']))?></td>
											 <td><?= $row['price']?></td>
											 <td><?= $row['book_qty']?></td>
											 <td><?= $row['available_qty']?></td>
											 <td>
											
											 <a href="javascript:avoid(0)" class="btn btn-info" data-toggle="modal" data-target="#book-<?=$row['id']?>"><i class="fa fa-eye"></i></a>
											 <a href="" class="btn btn-warning" data-toggle="modal" data-target="#book-update-<?=$row['id']?>"><i class="fa fa-pencil"></i></a>
											 <a href="delete.php?bookdelete=<?= base64_encode($row['id'])?>" class="btn btn-danger" onclick="return confirm('Are you sure to Delete ?')"><i class="fa fa-trash-o"></i></a>
											 </td>
									   </tr>
										 <?php
									 }
									
									?>
									   
									</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
					
               </div>  
				   
              </div>  
			  
			    <?php
				$result= mysqli_query($con, "select * from books");
			    while($row=mysqli_fetch_assoc($result)){
				 ?>                      
			  
			  <!-- Modal -->
                            <div class="modal fade" id="book-<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header state modal-info">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Book Information</h4>
                                        </div>
                                        <div class="modal-body">
										
										  <table class="table table-bordered"> 
										<tr>  
										      <th>Book Name</th>
											  <td><?= $row['book_name']?></td>
										</tr> 
										<tr> 
										    <th>Book Image</th>
											<td><img style="width:100px;" src="../images/books/<?= $row['book_image']?>" alt="" /></td>
										</tr>
                                        <tr>
										<th>Author Name</th>
										<td><?= $row['author_name']?></td>
										</tr>
                                        <tr> 
										 <th>Publication</th>
										 <td><?= $row['publication']?></td>
										</tr>
                                        <tr> 
										<th>Purchase Date</th>
										<td><?=date('d-M-Y',strtotime($row['purchase_date']))?></td>
										</tr>
                                        <tr> 
										<th>Price</th>
										 <td><?= $row['price']?></td>
										</tr>
										<tr> 
										  <th>Book quantity</th>
										  <td><?= $row['book_qty']?></td>
										</tr>
                                        
                                         <tr> 
										   <th>Avalilable Quantity</th>
										    <td><?= $row['available_qty']?></td>
										 </tr>                                      
																				  
										  </table>
                                           
                                        </div>
                                        <div class="modal-footer">
                                            
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<?php
							 }
									
							 ?>
							 
							 
						<?php
				$result= mysqli_query($con, "select * from books");
			    while($row=mysqli_fetch_assoc($result)){
					$id=$row['id'];
					$book_info=mysqli_query($con, "SELECT * FROM books where id='$id'");
					$book_info_row=mysqli_fetch_assoc($book_info);
				 ?>                      
			  
			  <!-- Modal -->
                            <div class="modal fade" id="book-update-<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header state modal-info">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Update Book Information</h4>
                                        </div>
                                        <div class="modal-body">
										 <div class="panel">
                                       <div class="panel-content">
                                       <div class="row">
                                         <div class="col-md-12">
                                          <form method="post">
                                           
										    <div class="form-group">
                                            <label for="book_name">book_name</label>
                                            
                                  <input type="text" class="form-control" name="book_name" placeholder="book_name" value="<?=$book_info_row['book_name'] ?>" required>
                                  <input type="hidden" class="form-control" name="id"  value="<?=$book_info_row['id'] ?>" required>
                                           
                                           </div>
										
										    <div class="form-group">
                                               <label for="author_name">Author_name</label>
                                          
                            <input type="text" class="form-control" name="author_name" placeholder="author_name" value="<?=$book_info_row['author_name'] ?>" required>
                                           
                                             </div>
										
										 <div class="form-group">
                                            <label for="publication">Publication</label>
                                        
                         <input type="text" class="form-control" name="publication" placeholder="publication" value="<?=$book_info_row['publication'] ?>"required>
                                       
                                        </div>
										 <div class="form-group">
                                            <label for="purchase_date">Purchase_date</label>
                                            
                      <input type="date" class="form-control" name="purchase_date" placeholder="purchase_date" value="<?=$book_info_row['purchase_date'] ?>" required>
                                         
                                        </div>
										
										 <div class="form-group">
                                            <label for="price">Price</label>
                                            
                       <input type="number" class="form-control" name="price" placeholder="price" value="<?=$book_info_row['price'] ?>" required>
                                            
                                        </div>
										
										 <div class="form-group">
                                            <label for="book_qty">Book_qty</label>
                                            
                      <input type="number" class="form-control" name="book_qty" placeholder="book_qty" value="<?=$book_info_row['book_qty'] ?>" required>
                                           
                                        </div>
										
										 <div class="form-group">
                                            <label for="available_qty">Available_qty</label>
                                         
                    <input type="number" class="form-control" name="available_qty" placeholder="available_qty" value="<?=$book_info_row['available_qty'] ?>" required>
                                           
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <button type="submit" name="update" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                                           </div>
                                         </form>
                                      </div>
                                     </div>
                                   </div>
                                  </div>
                                           
                                  </div>
                                        
                                 </div>
                               </div>
                            </div>
							<?php
							 }
                             if(isset($_POST['update'])){
	  $book_name=$_POST['book_name'];
	  $id=$_POST['id'];
	  $author_name=$_POST['author_name'];
	  $publication=$_POST['publication'];
	  $purchase_date=$_POST['purchase_date'];
	  $price=$_POST['price'];
	  $book_qty=$_POST['book_qty'];
	  $available_qty=$_POST['available_qty'];
	
	  $librarian_username=$_SESSION['librarian_username'];
	
	
	   $update="UPDATE `books` SET `book_name`='$book_name', `author_name`='$author_name', `publication`='$publication', `purchase_date`='$purchase_date', `price`='$price', `book_qty`='$book_qty', `available_qty`='$available_qty', `librarian_username`='$librarian_username' where id='$id'";
      $result=mysqli_query($con,$update);
        if($result){
		?>
		<script type="text/javascript"> 
		alert('Book update successfully !');
		javascript:history.go(-1);
		</script>
	   <?php
	}else{
		?>
		<script type="text/javascript"> 
		alert('Book not update');
		</script>
		<?php
	}
         }								
								
		?>	 
						
						
							 
      
     <?php 
	 require_once 'l_footer.php';
	 ?>