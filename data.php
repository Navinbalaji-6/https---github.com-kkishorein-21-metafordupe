<?php
require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/61b5bd9a69.js" crossorigin="anonymous"></script>  
  </head>
  <body>
  <div class="row g-3 align-items-center">
  <div class="col-auto">
    <label for="inputPassword6" class="col-form-label">Search for:</label>
  </div>
  <div class="col-auto">
  <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="search for place">
  </div>
  <div class="col-auto">
  <button type="submit" class="btn btn-primary">SEARCH</button>
  </div>
</div>
    <table border = 1 cellspacing = 0 cellpadding = 10>
      <?php
      $i = 1;
      $rows = mysqli_query($conn, "SELECT * FROM td_upload ORDER BY id DESC")
      ?>

      <?php foreach ($rows as $row) : ?>
    <!--  <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td> <img src="img/<?php echo $row["image"]; ?>" width = 200 title="<?php echo $row['image']; ?>"> </td>
      </tr>  -->
<div class="card mb-3 mx-auto"  style="max-width: 1460px;box-shadow:10px 10px 4px lightblue;">
  <div class="row g-0">
    <div class="col-md-2">
      <img src="img/<?php echo $row["image"]; ?>" width = 250 height= 200 title="<?php echo $row['image']; ?>"  alt="...">
    </div>
    <div class="col-md-10">
      <div class="card-body">
        <h4 class="card-title" style="display:inline-block;margin-right:10px;"><i><?= $row['name'];  ?></i></h4>
        <div href="#" style="font-size:25px;display:inline-block;padding-right:100px;padding-top:5px;"><i>starts @ &#x20b9 <?= $row['price']; ?></i></div>
        <p class="card-text" >
        <i class="fa-solid fa-location-dot" style="color:#808080"></i>  <b><?= $row['state']?></b>   
          <span class="badge badge-pill badge-success" style="margin-left:15px;background-color: #563d7c; color:#FFF"> <i class="fa-solid fa-plane-departure"></i>  <?= $row['airport']?></span>
          <span class="badge badge-pill badge-success" style="margin-left:15px;background-color: #44D62C; color:#FFF"> <i class="fa-solid fa-train"></i>  <?= $row['rail']?></span>
        </p>
        <p class="card-text" style="font-size:14px;"><?= $row['description']?></p>

      <a href="#" style="padding-bottom:10px;border-radius:8px;background-color: #4CAF50;border: none;
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 13px;
  margin: 4px 2px;
  cursor: pointer;" class="btn btn-primary btn-block"><i class="fa-solid fa-hotel pr-3"></i>  Book Hotels</a>
  <a href="#" style="padding-bottom:10px;border-radius:8px;background-color: #4CAF50;border: none;
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 13px;
  margin: 4px 2px;
  cursor: pointer;" class="btn btn-primary btn-block"><i class="fa-solid fa-car pr-3"></i>  Book Tickets</a>
      </div>
    </div>
  </div>
</div>
      <?php endforeach; ?>
    </table>
    <br>
    <a href="../uploadimagefile">More places</a>
  </body>
</html>
