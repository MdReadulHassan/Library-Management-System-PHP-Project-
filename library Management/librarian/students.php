<?php 
require_once 'l_header.php';
?>
           <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                            <li><a href="javascript: avoid(0)">Students</a></li>
                           
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
				    
                    <div class="col-sm-12">
                     <div class="pull-left"> <h4 class="section-subtitle"><b>All Students </b></h4></div>
					<div class="pull-right"><a href="print_students.php" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i>print</a></div>
					<div class="clearfix"></div>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                      
                                        <th>Roll</th>
                                        <th>Registration</th>
                                        <th>Email</th>
                                        <th>User_name</th>
                                        <th>Phone</th>
                                        <th>Image</th>
                                        <th>status</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody> 
									<?php
									 $result= mysqli_query($con, "select * from students");
									 while($row=mysqli_fetch_assoc($result)){
										 ?>
										 <tr> 
									         <td><?= ucwords($row['firstname'] . ' '. $row['lastname']) ?></td>
											 <td><?= $row['roll'] ?></td>
											 <td><?=$row['reg'] ?></td>
											 <td><?=$row['email'] ?></td>
											 <td><?=$row['username'] ?></td>
											 <td><?=$row['phone'] ?></td>
											 <td><img src="<?=$row['image'] ?>" alt="" /></td>
											 <td><?=$row['status']==1? 'Active' : 'Inactive'?></td>
											 <td> 
											 <?php 
											 if($row['status']==1){
												 ?>
											 <a href="status_inactive.php?id=<?= base64_encode($row['id']) ?>" class="btn btn-primary"><i class="fa fa-arrow-up"></i></a>
											 <?php
											 } else {
												 ?>
											 <a href="status_active.php?id=<?= base64_encode($row['id']) ?>" class="btn btn-warning"><i class="fa fa-arrow-down"></i></a>
											 <?php
											 }
											 ?>
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
      
     <?php 
	 require_once 'l_footer.php';
	 ?>