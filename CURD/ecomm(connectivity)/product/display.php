<?php
  include_once('config.php');
$sql = "SELECT id,name,age,size,color,details,image,price FROM product";
$result = mysqli_query($conn, $sql);


//mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>display</title>
  <link rel="stylesheet" type="text/css" href="display.css">
</head>
<body>
<?php 

     if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) {
 ?>
<div class="a-box">
  <div class="img-container">
    <div class="img-inner">
      <div class="inner-skew">
        <img src="<?php echo$row['image'];  ?>">
      </div>
    </div>
  </div>
  <div class="text-container">
    <h3><?php echo$row['name']; ?></h3>
    <div>
      <?php echo"pass is : ";echo$row['age']; echo"</br>" ?>

      <?php echo"mno  : "; echo$row['size']; ?>
      <?php echo"mno  : "; echo$row['color']; ?>
      <?php echo"mno  : "; echo$row['details']; ?>
      <?php echo"mno  : "; echo$row['image']; ?>
        <?php echo"email : ";echo$row['price']; echo"</br>" ?>
  </div>
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