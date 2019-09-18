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
                           
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
				     <div class="col-sm-12"> 				 
					   
					   <div class="row">
					    <?php
				    $books=mysqli_query($con,"select * from books");
					$total_books=mysqli_num_rows($books);
					$books_qty=mysqli_query($con,"select sum(book_qty) as total from books");
					$qty=mysqli_fetch_assoc($books_qty);
					$books_qty_a=mysqli_query($con,"select sum(available_qty) as total from books");
					$qty_a=mysqli_fetch_assoc($books_qty_a);
				   ?>                    
                    <!--BOX Style 1-->
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                            <a href="managebook.php">
                                <div class="panel-content">
                                    <h1 class="title color-darker-2"> <i class="fa fa-book"></i><?= $total_books.' ( '.$qty['total'].' - '.$qty_a['total'].' )'?></h1>
                                    <h4 class="subtitle color-darker-1">Books</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                   <?php
				    $students=mysqli_query($con,"select * from students");
					$total_students=mysqli_num_rows($students);
				   ?>                    
                    <!--BOX Style 1-->
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                            <a href="students.php">
                                <div class="panel-content">
                                    <h1 class="title color-darker-2"> <i class="fa fa-users"></i><?= $total_students?></h1>
                                    <h4 class="subtitle color-darker-1"> Students</h4>
                                </div>
                            </a>
                        </div>
                    </div>
					
					<?php
				    $librarians=mysqli_query($con,"select * from librarian");
					$total_librarians=mysqli_num_rows($librarians);
				   ?>                    
                    <!--BOX Style 1-->
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                            <a href="#">
                                <div class="panel-content">
                                    <h1 class="title color-darker-2"> <i class="fa fa-users"></i><?= $total_librarians?></h1>
                                    <h4 class="subtitle color-darker-1">Librarians</h4>
                                </div>
                            </a>
                        </div>
                    </div>
					
					
                    
                    
					   
					 </div>
                 </div>  
      
     <?php 
	 require_once 'l_footer.php';
	 ?>