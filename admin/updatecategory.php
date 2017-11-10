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