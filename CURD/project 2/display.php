<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container">
  <h2>Bordered Table</h2>
  <p>The w3-bordered class adds a bottom border to each table row:</p>

  <table class="w3-table w3-bordered">
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Mid name</th>
      <th>Address</th>
      <th>Contact</th>
     <th><a href="edit.php">edit</a> </th>
    <th><a href="delete.php">edit</a> </th>
    </tr>
    <tr>
      <td><?php echo$row['first_name']; ?></td>
      <td><?php echo$row['last_name']; ?></td>
      <td><?php echo$row['mid_name']; ?></td>
     <td><?php echo$row['address']; ?></td>
    <td><?php echo$row['contact']; ?></td>

    </tr>
    
  </table>
</div>

</body>
</html>
