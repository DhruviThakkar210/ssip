<?php 
	
	include_once 'config.php';
	if(isset($_POST['submit']))
	{
		$name=$_POST['name'];
		$age=$_POST['age'];
		$size=$_POST['size'];
		$color=$_POST['color'];
		$details=$_POST['details'];
		$image=$_POST['image'];
		$price=$_POST['price'];
		
		$sql = "INSERT INTO product (name, age,size,color,details,image,price)VALUES ('$name', '$age','$size','$color','$details','$image','$price')";

		if (mysqli_query($conn, $sql)) {
		 	header("Location: display.php");
		} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

mysqli_close($conn);

	}

 ?>