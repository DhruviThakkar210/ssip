<?php 
	
	include_once 'config.php';
	if(isset($_POST['submit']))
	{
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$mid_name=$_POST['mid_name'];
		$address=$_POST['address'];
		$contact=$_POST['contact'];
		
		$sql = "INSERT INTO people (first_name, last_name,mid_name,address,contact)VALUES ('$first_name', '$last_name','$mid_name','$address','$contact')";

		if (mysqli_query($conn, $sql)) {
		 	header("display.php");
		} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

mysqli_close($conn);

	}

 ?>