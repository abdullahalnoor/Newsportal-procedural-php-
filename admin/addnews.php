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
        <title>Dashboard </title>
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
                    
                    <h1>Add News</h1>
                    <form action="addednews.php" method="POST"  enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Add Title:</label>
                            <input type="text" class="form-control" name="title" placeholder="Add Title">
                        </div>							
                        <div class="form-group">
                            <label for="category_id">Select Category id (select one):</label>
                            <select class="form-control" id="category_id" name="category_id">
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<option value='$row[category_id]'>" . $row['name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="details">Add details:</label>
                            <textarea type="text" class="form-control" name="details" placeholder="Add Deatails"></textarea>
                        </div>	
                        <div class="form-group">
                            <label for="image">Add image:</label>
                            <input type="file" name="image" >
                        </div>  
                        <button type="submit" name="submit"class="btn btn-success">Add News</button>
                    </form>
                    
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
