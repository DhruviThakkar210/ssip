<?php 
	
	include_once 'config.php';
	if(isset($_POST['submit']))
	{
		
		$image=$_POST['image'];
		
		
		$sql = "INSERT INTO photo (image)VALUES ('$image')";

		if (mysqli_query($conn, $sql)) {
		 	header("Location: display.php");
		} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

mysqli_close($conn);

	}

 ?>