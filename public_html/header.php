<?php 
 $connect = mysqli_connect("localhost", "root", "", "newspaper");
  if (!$connect) {
	  die("database failed" . mysqli_connect_error());
       }   
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>NEWS WORLD</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/newcss.css" rel="stylesheet" type="text/css"/>
        <link href="css/fonts/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="css/fonts/font-awesome.min.css" type="text/css">
       
    </head>
    <body>
                
                <div class="container logo">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <img src="bd_img/logo.png" alt="" class="img-responsive"/>
                        </div>
                        <div class="col-md-4 col-sm-4"></div>
                        <div class="col-md-4 col-sm-4 ">
                            <div class="row">
                                <div class="col-md-12 col-sm-12  ">
                              <div class="icon-bar  headic pull-right">                                  
                                    <a class="active" href="#"><i class="fa fa-google-plus"></i></a> 
                                    <a href="#"><i class="fa fa-facebook"></i></a> 
                                    <a href="#"><i class="fa fa-twitter"></i></a> 
                                    <a href="#"><i class="fa fa-google"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a> 
                                    <a href="#"><i class="fa fa-linkedin"></i></a> 
                                </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
							
									
                                 <form action="search.php" method="get" class="navbar-form  pull-right">
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
                            </div>
                        </div>
                    </div>
                </div>
                 
               <div class="container-fluid nb">
                <nav class="navbar navbar-default">
                           <div class="container-fluid">
                             <div class="navbar-header">
                               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                 <span class="sr-only">Toggle navigation</span>
                                 <span class="icon-bar"></span>
                                 <span class="icon-bar"></span>
                                 <span class="icon-bar"></span>
                               </button>
                               <a class="navbar-brand " href="index.php">NEWS WORLD</a>
                             </div>
                             <div id="navbar" class="navbar-collapse collapse">
                               <ul class="nav navbar-nav">
                                 <li><a href="index.php" style="font-size:19px;">Home</a></li>
								 <?php 
						$query = "SELECT * FROM category WHERE category_id !='1'";
                    $result = mysqli_query($connect, $query);
					?>
					<?php while ($row = mysqli_fetch_assoc($result)) {?>
                                 <li><a style="font-size:19px;" href="category.php?id=<?php echo $row['category_id'];?>">
								 <?php echo $row['name'];?></a></li>
								 <?php }?>                    
                               </ul>
                                 
                             </div><!--/.nav-collapse -->
                           </div><!--/.container-fluid -->
                         </nav>

               
        </div>    
          