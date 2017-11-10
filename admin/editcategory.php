<?php session_start() ?>
<?php
if(isset($_SESSION['id'])){
    
}else{
    header('location:index.php');
}
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

        <title>Update Category </title>
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
<?php
$connect = mysqli_connect("localhost", "root", "", "newspaper");
                    if (!$connect) {
                        die("database failed" . mysqli_connect_error());
                    }
				$currentID = $_GET['id'];
				$query = "SELECT * FROM category WHERE category_id= $currentID";
				$result = mysqli_query($connect, $query);
				$row = mysqli_fetch_array($result);
?>
        <div class="container-fluid">
            <div class="row">
                <?php
                include_once 'inc/menuside.php';
                ?>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<h1 class="page-header">Update Category</h1>
                    <form action="" method="POST">
						<div class="form-group">
						  <label for="category">Update Category:</label>
						  <input type="text" class="form-control" name="category" value ="<?php echo $row['name'] ?>" placeholder="Add Category" required="">
						</div>
						
						
						<button type="submit" name = "submit" class="btn btn-default">Update</button>
					  </form>
						<?php

						if(isset($_POST['submit'])){

						$category = $_POST["category"];

						  $query = "UPDATE category SET name='$category' WHERE category_id=$currentID";
						  $result = mysqli_query($connect, $query);
						   
						   if(!$result){
							   echo "Query Failed".mysqli_connect_errno();
						   }else{
							   $_SESSION["message"] ="Category Update Successfully";
							   header("Location:allcategory.php");
						   }
						}
?>
                   
                    
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
