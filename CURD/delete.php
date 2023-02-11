<?php 

include_once 'config.php';
$id=$_REQUEST['id'];
	// sql to delete a record
$sql = "DELETE FROM people WHERE id='$id'";

if ($conn->query($sql) === TRUE) {

 header("location:display.php");
} else {
  echo "Error deleting record: " . $conn->error;
}



 ?>