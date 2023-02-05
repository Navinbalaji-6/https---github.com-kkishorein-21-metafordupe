<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Filter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/61b5bd9a69.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row g-3 align-items-center">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                            <div class="input-group mb-3">
                                <form action="" method="GET">
                                <div class="col-auto">
  <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="search for place">
  </div>
  <div class="col-auto">
  <button type="submit" class="btn btn-primary">SEARCH</button>
  </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            <div class="card-body">
                <table class="table table-bordered">
                        <?php
                    $con = mysqli_connect("localhost","root","","pload");
                    if(isset($_GET['search']))
                    {
                        $filtervalues = $_GET['search'];
                        $query= "SELECT * FROM td_upload WHERE CONCAT(name,state) LIKE '%$filtervalues%' ";
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0){
                            foreach($query_run as $items){
                                ?>
                               <div class="card mb-3 mx-auto"  style="max-width: 1460px;box-shadow:10px 10px 4px lightblue;">
  <div class="row g-0">
    <div class="col-md-2">
      <img src="img/<?php echo $items["image"]; ?>" width = 1280 height= 200 title="<?php echo $items['image']; ?>"  alt="...">
    </div>
    <div class="col-md-10" style=" margin-left : 5px">
      <div class="card-body">
        <h4 class="card-title" style="display:inline-block;margin-right:10px;"><i><?= $items['name'];  ?></i></h4>
        <div href="#" style="font-size:25px;display:inline-block;padding-right:100px;padding-top:5px;"><i>starts @ &#x20b9 <?= $items['price']; ?></i></div>
        <p class="card-text" >
        <i class="fa-solid fa-location-dot" style="color:#808080"></i>  <b><?= $items['state']?></b>   
          <span class="badge badge-pill badge-success" style="margin-left:15px;background-color: #563d7c; color:#FFF"> <i class="fa-solid fa-plane-departure"></i>  <?= $items['airport']?></span>
          <span class="badge badge-pill badge-success" style="margin-left:15px;background-color: #44D62C; color:#FFF"> <i class="fa-solid fa-train"></i>  <?= $items['rail']?></span>
        </p>
        <p class="card-text" style="font-size:14px;"><?= $items['descr']?></p>

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
                                <?php
                            }
                        }
                        else{
                            ?>
                        <tr>
                        <td colspan="4">
                                No Record Found
                        </td>
                    </tr>
                            <?php
                        }
                    }
                        ?>
                    
</tbody>
                </table>
            </div>
        </div>
    </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
</body>
</html>