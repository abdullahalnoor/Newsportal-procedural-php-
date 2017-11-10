<?php
session_start();
if (isset($_SESSION['id'])) {
    
} else {
    header('location:index.php');
}
$connect = mysqli_connect("localhost", "root", "", "newspaper");
$query = "SELECT * FROM category";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">
        <title>Update New </title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/dashboard.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Project name</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><?php echo $_SESSION['name'] ?></a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <?php
                include_once 'inc/menuside.php';
                ?>

                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                  
                    <h1>Update News</h1>
					 <?php
                        $currentID = $_GET['id'];
                        $query = "SELECT * FROM news WHERE news_id= $currentID";
                        $result = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                    <form action="" method="POST"  enctype="multipart/form-data" style="margin-bottom:5000px;">
                        <div class="form-group">
                            <label for="title">Update Title:</label>
                            <input type="text" class="form-control" name="title" value ="<?php echo $row['title'] ?>">
                        </div>							
                        <div class="form-group">
                            <label for="category_id">Select Category id (select one):</label>
                            <select class="form-control" id="category_id" name="category_id">
                                <?php
								 $query = "SELECT * FROM category";
                                $result = mysqli_query($connect, $query);
                                while ($rows = mysqli_fetch_array($result)) {?>
                                    <option 
									 <?php 
                                    if($row['category_id'] == $rows['category_id']){ ?>
                                        selected="selected";
                                    <?php } ?>
									value ="<?php echo $rows['category_id'] ?>"> 
									<?php echo $rows['name'] ?></option>
                               <?php }
                                ?>
                            </select>
                        </div> 
                       <div class="form-group">
                                <label for="details">Update details:</label>
                                <textarea rows="7" cols="50" type="text" class="form-control" name="details"  placeholder="Add Deatails"><?php echo $row['details'] ?></textarea>
                            </div>		
                        <div class="form-group">
						<img src="<?php echo $row['image'];?>" alt="hello"  class = "img-responsive" style="height:70px;width:200px"/>
                        
						<br>
                            <label for="image">Change image:</label>
                            <input type="file" name="image" >
                        </div>  
                        <button type="submit" name="submit" class="btn btn-success">Update </button>
                    </form>
					 <?php } ?>
                   <?php
                    if (isset($_POST['submit'])) {
                        $connect = mysqli_connect("localhost", "root", "", "newspaper");
                        if (!$connect) {
                            die("database failed" . mysqli_connect_error());
                        }
                        $permited = array('jpg', 'jpeg', 'png', 'gif');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_tmp = $_FILES['image']['tmp_name'];
                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
                        $uploaded_image = "uploads/" . $unique_image;
                        move_uploaded_file($file_tmp, $uploaded_image);
                        $title = $_POST["title"];
//$date = $_POST["date"];
                        $image = $_FILES['image']['name'];
                        $details = $_POST["details"];
                        $category_id = $_POST["category_id"];
						 $currentID = $_GET['id'];
                        $query = "Update  news Set title = '$title', image = '$uploaded_image',details = '$details', category_id = '$category_id'
						 Where news_id = '$currentID ' ";
                    }
                    $result = mysqli_query($connect, $query);
                    if (!$result) {
                        echo "Query Failed" . mysqli_connect_errno();
                    } else {
                        $_SESSION["message"] = "<h3 class='text-success'>News Upadte Successfully</h3>";                    
						header("location: news.php");
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>
 