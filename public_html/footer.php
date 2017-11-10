<?php 
 $connect = mysqli_connect("localhost", "root", "", "newspaper");
  if (!$connect) {
	  die("database failed" . mysqli_connect_error());
       }   
?>				
				</div>        
        
            <div class="container-fluid bg-primary cl ">
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-md-offset-2">
                        <address>
                            Published by <a href="mailto:webmaster@example.com">News World</a>.<br> 
                            Visit us at:<br>
                            newsworl@gmail.com<br>
                            BCC 1202, Karowan Bazar<br>
                            Dhaka, Bangladesh
                            </address>
                    </div>
                    <div class="col-md-3 col-sm-4 ">
                        
                               <ul>
                                 <li><a href="index.php">Home</a></li>
								 <?php 
										$query = "SELECT * FROM category WHERE category_id !='1'";
									$result = mysqli_query($connect, $query);
									?>
									<?php while ($row = mysqli_fetch_assoc($result)) {?>
										 <li><a style="text-transform:lowercase" href="category.php?id=<?php echo $row['category_id'];?>">				 
										 <?php echo $row['name'];?>
										 </a></li>
								 <?php }?>                   
                               </ul>
                                  <form action="search.php" method="get" class="navbar-form  pull-left">
                                   <div class="input-group">								   									
                                     <input type="text" name="search" class="form-control " placeholder="Search">
                                     <div class="input-group-btn">
                                       <button class="btn btn-default" type="submit" name="submit">
                                         <i class="glyphicon glyphicon-search"></i>
                                       </button>
                                     </div>
                                   </div>
                                 </form>
                            
                    </div>
                    <div class="col-md-3 col-sm-4">
                        
                         <ul>
                                 <li > <a class="active" href="#"><i class="fa fa-google-plus"></i>google-plus</a></li>
                                 <li><a href="#"><i class="fa fa-facebook"></i> facebook</a> </li>
                                 <li><a href="#"><i class="fa fa-twitter"></i></a> twitter</li>
                                 <li><a href="#"><i class="fa fa-google"></i> google</a> </li>
                                 <li><a href="#"><i class="fa fa-instagram"></i> instagram</a> </li>
                                 <li><a href="#"><i class="fa fa-linkedin"></i> linkedin</a> </li>                
                               </ul>                    
                    </div>
                </div>
                <div class="row text-center ar">
                    <a class="text-muted"> @ All right reserved by The Online News World</a>
                </div>
                
            </div>
        
        
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
