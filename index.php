<?php
require 'connection.php';
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $state = $_POST["state"];
  $airport = $_POST["airport"];
  $rail = $_POST["rail"];
  $country = $_POST["country"];
  $localcurr = $_POST["localcurr"];
  $price = $_POST["price"];
  $famousplace = $_POST["famousplace"];
  $description = $_POST['description'];
  if($_FILES["image"]["error"] == 4){
    echo
    "<script> alert('Image Does Not Exist'); </script>"
    ;
  }
  else{
    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if ( !in_array($imageExtension, $validImageExtension) ){
      echo
      "
      <script>
        alert('Invalid Image Extension');
      </script>
      ";
    }
    else if($fileSize > 1000000){
      echo
      "
      <script>
        alert('Image Size Is Too Large');
      </script>
      ";
    }
    else{
      $newImageName = uniqid();
      $newImageName .= '.' . $imageExtension;

      move_uploaded_file($tmpName, 'img/' . $newImageName);
      $query = "INSERT INTO td_upload VALUES('', '$name', '$newImageName','$state','$airport','$rail','$country','$localcurr','$price','$famousplace','$description')";
      mysqli_query($conn, $query);
      echo
      "
      <script>
        alert('Successfully Added');
        document.location.href = 'data.php';
      </script>
      ";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Upload Image File</title>
  </head>
  <body>
    <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
      <label for="name">Name : </label>
      <input type="text" name="name" id = "name" required value=""> <br>
      <label for="state">state : </label>
      <input type="text" name="state" id = "state" required value=""> <br>
      <label for="airport">Airport : </label>
      <input type="text" name="airport" id = "airport" required value=""> <br>
      <label for="rail">Rail : </label>
      <input type="text" name="rail" id = "rail" required value=""> <br>
      <label for="country">country : </label>
      <input type="text" name="country" id = "country" required value=""> <br>
      <label for="localcurr">localcurr : </label>
      <input type="text" name="localcurr" id = "localcurr" required value=""> <br>
      <label for="price">price : </label>
      <input type="text" name="price" id = "price" required value=""> <br>
      <label for="famousplace">famousplace : </label>
      <input type="text" name="famousplace" id = "famousplace" required value=""> <br>
      <label for="image">Image : </label>
      <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value=""> <br> <br>
      <label for="famousplace">Description : </label>
      <input type="text" name="description" id = "description" required value=""> <br>
      <button type = "submit" name = "submit">Submit</button>
    </form>
    <br>
    <a href="data.php">Data</a>
  </body>
</html>
