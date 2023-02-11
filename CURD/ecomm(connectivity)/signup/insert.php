<?php 
	
	include_once 'config.php';
	if(isset($_POST['submit']))
	{
		$name=$_POST['name'];
		$pass=$_POST['pass'];
		$mno=$_POST['mno'];
		$email=$_POST['email'];
		
		$sql = "INSERT INTO user (name, pass,mno,email)VALUES ('$name', '$pass','$mno','$email')";

		if (mysqli_query($conn, $sql)) {
		 	header("Location: display.php");
		} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

mysqli_close($conn);

	}

 ?>