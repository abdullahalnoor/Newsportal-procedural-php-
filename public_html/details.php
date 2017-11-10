<?php include "header.php";?>  
        <?php
		 if(!isset($_GET["id"]) OR $_GET["id"] == NULL){
						echo "Data not found";
					 }else{
						 $cid = $_GET["id"];
					 }
		?>
        <div class="container">
             <div class="row">
                   <div class="col-md-12 col-sm-8">
                       <ol class="breadcrumb">
                           <li><a href="index.php">Home</a></li>
                           <li><a href="details.php">Details</a></li>
                         </ol>
                   </div>
               </div>
            <div class="row">
                <div class="col-md-9 col-sm-9">    					
                    <?php 
					
					$query = "SELECT * FROM news WHERE news_id = $cid ";
                    $result = mysqli_query($connect, $query);
					?>
					<?php while ($row = mysqli_fetch_assoc($result)) {?>              
                                <h2 style="color:#269ABC"><?php echo $row['title']; ?></h2>
								<br>
                               
                                <img src="<?php echo '../admin/'.$row['image'];?>" alt="hello"  class = "img-responsive" style="height:350px;width:100%"/>
								<br>
                                <p class="text-justify" style="padding:10px;">
									<?php echo $row['details']; ?>
                                </p>
					<?php }?>
                              <div class="icon-bar pull-right detailsic">                                  
                                    <a class="active" href="#"><i class="fa fa-google-plus"></i></a> 
                                    <a href="#"><i class="fa fa-facebook"></i></a> 
                                    <a href="#"><i class="fa fa-twitter"></i></a> 
                                    <a href="#"><i class="fa fa-google"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a> 
                                    <a href="#"><i class="fa fa-linkedin"></i></a> 
                                </div>
                            
                     
                </div>
					<?php include "sidebar.php"; ?>
            </div>
          
			
			
			
			
			
			
			
			
        
    <?php include "footer.php";?>