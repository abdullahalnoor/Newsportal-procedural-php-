<?php include"header.php"; ?>

<?php
if (isset($_GET['submit'])) {
    $search = $_GET['search'];

    $query = "SELECT * FROM news WHERE title like '%$search%' OR details like '%$search%' ";

    $result = mysqli_query($connect, $query);
}
?>


<div class="container">

    <div class="row">
        <h3 style="color:#265A88" class="text-center"> Showing Search Result......</h3>
        <div class="col-md-8 col-sm-8 ">                    
            <div class="jumbotron">

                <table class="table">	
                    <?php
                    if(mysqli_num_rows($result) == 0){
                        echo "No Search Data here";
                    }else{
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>	
                        <tbody>

                            <tr>
                                <td >
                                    <img src="<?php echo '../admin/' . $row['image']; ?>" alt="hello"  class = "img-responsive" style="width:120px;height:90px;padding:5px;"/>									 
                                </td>
                                <td >
                                    <a href="details.php?id=<?php echo $row['news_id']; ?>">
                                        <h5><?php echo $row['title']; ?></h5>
                                    </a>	
                                    <p style="font-size:14px;"><?php echo substr($row['details'], 0, 120); ?></p>

                                </td>										
                            </tr>									
                    <?php }} ?>
                    </tbody>
                </table>
            </div>	
        </div>
			<?php include "sidebar.php"; ?>
    </div>




</div>







<?php include"footer.php"; ?>