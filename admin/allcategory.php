<?php session_start() ?>
<?php
if (isset($_SESSION['id'])) {
    
} else {
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
                    <a class="navbar-brand" href="#">News World Admin</a>
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
                    <h1 class="page-header">All Category</h1>
                    <a href="addcategory.php" class="btn btn-success">
                        Add Category
                    </a>
<?php
if(isset($_SESSION["message"])){
	echo $_SESSION["message"];
	$_SESSION["message"] = NULL;
}
?>
                    <?php
                    $connect = mysqli_connect("localhost", "root", "", "newspaper");
                    if (!$connect) {
                        die("database failed" . mysqli_connect_error());
                    }
                    $query = "SELECT * FROM category";
                    $result = mysqli_query($connect, $query);
                    ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>                                 
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['category_id'] ?></td>
                                        <td><?php echo $row['name'] ?></td>                                       
                                            <td>
											<a href="editcategory.php?id=<?php echo $row['category_id'] ?>" class="btn btn-info">
                                                Edit
                                            </a>
								
                                            <a onclick="return confirm('Are You Sure to Delete This Category ??')"
											href="deletecategory.php?id=<?php echo $row['category_id'] ?>" class="btn btn-danger">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
								
                            </tbody>
                        </table>
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
