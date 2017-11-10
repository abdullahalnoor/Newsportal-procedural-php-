 <div class="col-md-3 col-sm-3">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 brd">                               
                            <a> Recently Added</a>                            
                        </div>                                                                                                                       
                    </div>
                    <div class="row">
					<?php 
						$query = "SELECT * FROM news ORDER BY news_id desc limit 11";
                    $result = mysqli_query($connect, $query);
					$row = mysqli_fetch_all($result,MYSQLI_ASSOC);
					$firstdata = $row[0];
					$seconddata = array_slice($row, 1);
					?>
					
                    <div class="col-md-12 col-sm-12">
					<?php foreach ($seconddata as $row) {?>
                     <div class="row">
					 
                     <div class="col-xs-4 ">
						<img src="<?php echo '../admin/'.$row['image'];?>" alt="" class="img-responsive" style="height:50px;width:100%"/>
							
					 </div>
					  <div class="col-xs-8 ">
						<a href="details.php?id=<?php echo $row['news_id'];?>">
						<?php echo substr($row['title'],0,40).'   ...'?>
						</a>
                              
					 </div>
                     </div>
					<?php } ?>
                      </div>
                </div>
            </div>