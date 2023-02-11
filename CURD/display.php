
<?php
  include_once('config.php');
$sql = "SELECT id,first_name,last_name,mid_name,address,contact FROM people";
$result = mysqli_query($conn, $sql);


//mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>



<div class="w3-container">
  <?php 

     if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) {
 ?>

  <table class="w3-table w3-bordered">
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Mid name</th>
      <th>Address</th>
      <th>Contact</th>
     <th></th>
    <th> </th>
    </tr>
    <tr>
      <td><?php echo$row['first_name']; ?></td>
      <td><?php echo$row['last_name']; ?></td>
      <td><?php echo$row['mid_name']; ?></td>
     <td><?php echo$row['address']; ?></td>
    <td><?php echo$row['contact']; ?></td>
    <td><a href="edit.php">edit</a> </td>
    <td><a href="delete.php">delete</a> </td>

    </tr>
    
  </table>
</div>
<?php 
            }
          }
            else {
              echo "0 results";
            }
            mysqli_close($conn)
         ?>

</body>
</html>
