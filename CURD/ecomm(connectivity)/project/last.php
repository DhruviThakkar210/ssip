<?php
// Connect to the database
$servername = "localhost";
$username = "username";
$password = "root";
$dbname = "ssip";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the image from the database
$sql = "SELECT image FROM photo WHERE id=1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $image = $row["image"];
} else {
    echo "0 results";
}

// Display the image
header("Content-type: image/jpeg");
echo $image;

// Close the connection
mysqli_close($conn);
?>