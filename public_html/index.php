 <?php 
 include "header.php";    ?>

        
        <div class="container">
            <div class="row">
				
                <div class="col-md-9 col-sm-9">
                    <div class="row">
					<?php 
						$query = "SELECT * FROM news ORDER BY news_id desc limit 7";
                    $result = mysqli_query($connect, $query);
					$row = mysqli_fetch_all($result,MYSQLI_ASSOC);
					$firstdata = $row[0];
					$seconddata = array_slice($row, 1);
					?>
					
                        <div class="col-md-6">  
                                  
								
                            <img src="<?php echo '../admin/'.$firstdata['image'];?>" alt="hello"  class = "img-responsive" style="height:250px;width:100%"/>
                        </div>
                        <div class="col-md-6">

                            <main><h3><a href="details.php?id=<?php echo $firstdata['news_id'];?>"><?php echo $firstdata['title'] ?></a></h3></main>
                                <p class="text-justify">
								<?php echo substr($firstdata['details'],0,400); ?>
                                  </p> 
                                <div class="text-right"> 
                                    <span>  <i class="glyphicon glyphicon-time"></i> <?php echo $firstdata['date'] ?></span> 
                                                               
                                </div>
                        </div>
                    </div>
                   
                    <div class="row mrg">
					<?php foreach ($seconddata as $row) {?>
                        <div class="col-md-4 col-sm-4  col-xs-12" style="margin-bottom:20px ;">
                            <div>
							<img src="<?php echo '../admin/'.$row['image'];?>" alt="" class="img-responsive" style="height:170px;width:100%"/>
							</div>
                            <div>
                                <a href="details.php?id=<?php echo $row['news_id'];?>"><?php echo substr($row['title'],0,40).'   ...'?></a>
                                <p>
                                   <?php echo substr($row['details'],0,100);  ?> 
								</p>
                                <span ><i class="glyphicon glyphicon-time"></i> <?php echo $row['date'] ?></span>
                              
                            </div>
                        </div>
                     
					<?php }?>
                        
                    </div>
                </div>
					
               <?php include "sidebar.php"; ?>
            </div>
            <div class="row">
                
                <div class="col-md-8 col-sm-8">
                    <div class="row">
                        <div class="col-md-12 brd">                               
                            <a> Bangladesh News</a>  
                             <div class="box"></div> 
                        </div>                                                                                                                       
                    </div>
                    <div class="row">
                       <?php 
						$query = "SELECT * FROM news Where category_id ='13' ORDER BY news_id desc limit 4";
                    $result = mysqli_query($connect, $query);
					$row = mysqli_fetch_all($result,MYSQLI_ASSOC);
					$firstdata = $row[0];
					$seconddata = array_slice($row, 1);
					?> 
                                  
							<div class="col-md-6">

                            <img src="<?php echo '../admin/'.$firstdata['image'];?>" alt="hello"  class = "img-responsive" style="height:234px;width:352px"/>
                        </div>
                        <div class="col-md-6">

                            <main><h3><a href="details.php?id=<?php echo $firstdata['news_id'];?>"><?php echo $firstdata['title'] ?></a></h3></main>
                                <p class="text-justify">
								<?php echo substr($firstdata['details'],0,300); ?>
                                  </p> 
                                <div class="text-right"> 
                                    <span>  <i class="glyphicon glyphicon-time"></i> <?php echo $firstdata['date'] ?></span> 
                                                                 
                                </div>
                        </div>
	
                    </div>
                   
                    <div class="row mrg">
                       <?php foreach ($seconddata as $row) {?>
                        <div class="col-md-4 col-sm-4  col-xs-12">
                            <div><img src="<?php echo '../admin/'.$row['image'];?>" alt="" class="img-responsive" style="height:148px;width:222px"/></div>
                            <div>
                                <a href="details.php?id=<?php echo $row['news_id'];?>"><?php echo substr($row['title'],0,30).'   ...'?></a>
                                <p>
                                   <?php echo substr($row['details'],0,100) ;?> 
								</p>
                                <span><i class="glyphicon glyphicon-time"></i> <?php echo $row['date'] ?></span>
                               
                            </div>
                        </div>
                     
					<?php }?>
           
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                 
                </div>
            </div>
			
			
            <div class="row">
                
                <div class="col-md-8 col-sm-8">
                    <div class="row">
                        <div class="col-md-12 brd">                               
                            <a> International News</a>  
                             <div class="box"></div> 
                        </div>                                                                                                                       
                    </div>
                    <div class="row">
                         <?php 
						$query = "SELECT * FROM news where category_id ='14' ORDER BY news_id  desc limit 4";
                    $result = mysqli_query($connect, $query);
					$row = mysqli_fetch_all($result,MYSQLI_ASSOC);
					$firstdata = $row[0];
					$seconddata = array_slice($row, 1);
					?> 
                        <div class="col-md-6">  
                                  
								
                            <img src="<?php echo '../admin/'.$firstdata['image'];?>" alt="hello"  class = "img-responsive" style="height:234px;width:352px"/>
                        </div>
                        <div class="col-md-6">

                            <main><h3><a href="details.php?id=<?php echo $firstdata['news_id'];?>"><?php echo $firstdata['title'] ?></a></h3></main>
                                <p class="text-justify">
								<?php echo substr($firstdata['details'],0,300); ?>
                                  </p> 
                                <div class="text-right"> 
                                    <span>  <i class="glyphicon glyphicon-time"></i><?php echo $firstdata['date'] ?></span> |
                                                                 
                                </div>
                        </div>
						
                    </div>
                   
                    <div class="row mrg">
                     <?php foreach ($seconddata as $row) {?>
                        <div class="col-md-4 col-sm-4  col-xs-12">
                            <div><img src="<?php echo '../admin/'.$row['image'];?>" alt="" class="img-responsive" style="height:148px;width:222px"/></div>
                            <div>
                                <a href="details.php?id=<?php echo $row['news_id'];?>"><?php echo substr($row['title'],0,30).'   ...'?></a>
                                <p>
                                   <?php echo substr($row['details'],0,100) ; ?> 
								</p>
                                <span><i class="glyphicon glyphicon-time"></i><?php echo $row['date'] ?></span>
                                
                            </div>
                        </div>
                     
					<?php }?>
           
                    </div>
                </div>
				
                <div class="col-md-4"></div>
            </div>
			
            <div class="row">
                
                <div class="col-md-8 col-sm-8">
                    <div class="row">
                        <div class="col-md-12 brd">                               
                            <a> Economics News</a>  
                             <div class="box"></div> 
                        </div>                                                                                                                       
                    </div>
                     <div class="row">
                        <?php 
						$query = "SELECT * FROM news Where category_id ='15' ORDER BY news_id desc limit 4";
                    $result = mysqli_query($connect, $query);
					$row = mysqli_fetch_all($result,MYSQLI_ASSOC);
					$firstdata = $row[0];
					$seconddata = array_slice($row, 1);
					?> 
                        <div class="col-md-6">  
                                  
								
                            <img src="<?php echo '../admin/'.$firstdata['image'];?>" alt="hello"  class = "img-responsive" style="height:234px;width:352px"/>
                        </div>
                        <div class="col-md-6">

                            <main><h3><a href="details.php?id=<?php echo $firstdata['news_id'];?>"><?php echo $firstdata['title'] ?></a></h3></main>
                                <p class="text-justify">
								<?php echo substr($firstdata['details'],0,300) ; ?>
                                  </p> 
                                <div class="text-right"> 
                                    <span>  <i class="glyphicon glyphicon-time"></i>  <?php echo $firstdata['date'] ?></span> |
                                                                  
                                </div>
                        </div>
					
                    </div>
                   
                    <div class="row mrg">
                       
					<?php foreach ($seconddata as $row) {?>
                        <div class="col-md-4 col-sm-4  col-xs-12">
                            <div><img src="<?php echo '../admin/'.$row['image'];?>" alt="" class="img-responsive" style="height:148px;width:222px"/></div>
                            <div>
                                <a href="details.php?id=<?php echo $row['news_id'];?>"><?php echo substr($row['title'],0,30).'   ...'?></a>
                                <p>
                                   <?php echo substr($row['details'],0,100) ; ?> 
								</p>
                                <span><i class="glyphicon glyphicon-time"></i> <?php echo $row['date'] ?></span>
                             
                            </div>
                        </div>
                     
					<?php }?>
           
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="row">
                
                <div class="col-md-8 col-sm-8">
                    <div class="row">
                        <div class="col-md-12 brd">                               
                            <a> Education News</a>  
                             <div class="box"></div> 
                        </div>                                                                                                                       
                    </div>
                     <div class="row">
                        <?php 
						$query = "SELECT * FROM news where category_id ='16' ORDER BY news_id desc limit 4";
                    $result = mysqli_query($connect, $query);
					$row = mysqli_fetch_all($result,MYSQLI_ASSOC);
					$firstdata = $row[0];
					$seconddata = array_slice($row, 1);
					?> 
                        <div class="col-md-6">  
                                  
								
                            <img src="<?php echo '../admin/'.$firstdata['image'];?>" alt="hello"  class = "img-responsive" style="height:234px;width:352px"/>
                        </div>
                        <div class="col-md-6">

                            <main><h3><a href="details.php?id=<?php echo $firstdata['news_id'];?>"><?php echo $firstdata['title'] ?></a></h3></main>
                                <p class="text-justify">
								<?php echo substr($firstdata['details'],0,300) ; ?>
                                  </p> 
                                <div class="text-right"> 
                                    <span>  <i class="glyphicon glyphicon-time"></i>  <?php echo $firstdata['date'] ?></span> |
                                                               
                                </div>
                        </div>
						
                    </div>
                   
                    <div class="row mrg">
                       <?php foreach ($seconddata as $row) {?>
                        <div class="col-md-4 col-sm-4  col-xs-12">
                            <div><img src="<?php echo '../admin/'.$row['image'];?>" alt="" class="img-responsive" style="height:148px;width:222px"/></div>
                            <div>
                                <a href="details.php?id=<?php echo $row['news_id'];?>"><?php echo substr($row['title'],0,30).'   ...'?></a>
                                <p>
                                   <?php echo substr($row['details'],0,100) ; ?> 
								</p>
                                <span><i class="glyphicon glyphicon-time"></i> <?php echo $row['date'] ?></span>
                                
                            </div>
                        </div>
                     
					<?php }?>
           
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
			
	
	
    
    <?php include "footer.php";?>