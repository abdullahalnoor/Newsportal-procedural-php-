<?php session_start() ?>
<?php
if(isset($_SESSION['id'])){
    
}else{
    header('location:index.php');
}
?>
<?php
$connect = mysqli_connect("localhost", "root", "", "newspaper");
                    if (!$connect) {
                        die("database failed" . mysqli_connect_error());
                    }
				$currentID = $_GET['id'];
				echo $currentID;
				$query = "DELETE FROM category WHERE category_id= $currentID";
				$result = mysqli_query($connect, $query);
				 
   if(!$result){
	   echo "Query Failed".mysqli_connect_errno();
   }else{
	   $_SESSION["message"] ="Category Delete Successfully";
	   header("Location:allcategory.php");
   }
?>
     
