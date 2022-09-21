<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Data</title>
  <!-- CDN BootStrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>


<body>
    <?php
    $mysqli = new mysqli("localhost", "root", "root", "carinfo");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
    ?>
  <div class="container">
    <h1 class="text-danger">Form Data : </h1>
    <form action="cars.php" method="post">
      <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="url" name="img" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Model</label>
        <input type="text" name="model" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" name="price" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Color</label>
        <input type="text" name="color" class="form-control" required>
      </div>
      <!-- <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="text" name="pass" class="form-control" required>
      </div> -->
      <div class="mb-3 form-check">
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
<div class="container p-5">
    <div class="row g-2">
    <?php 
  $sql = "SELECT * FROM cars";
  $result = $mysqli->query($sql);
  
  // Fetch all
  $result->fetch_all(MYSQLI_ASSOC);
  foreach ($result as $car){
  ?>

    <div class="col-sm-4">
        <div class="card">
            <img src="<?php echo $car["img"]; ?>" class="card-img-top" style="height: 250px; object-fit: cover;" alt="">
            <div class="card-body">
                <h5 class="card-title"><?php echo $car["model"]; ?></h5>
                <p class="card-text">Price: <?php echo $car["price"]; ?> <br> Color: <?php echo $car["color"] ?></p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                  Edit
                </button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal<?php echo $car['carid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
              
                <h1 class="text-danger">Form Data : </h1>
                <form action="cars.php" method="post">
                  <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="url" name="img" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Model</label>
                    <input type="text" name="model" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Color</label>
                    <input type="text" name="color" class="form-control" required>
                  </div>
                  <!-- <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="text" name="pass" class="form-control" required>
                  </div> -->
                  <div class="mb-3 form-check">
                  </div>
                </form>
              
          </div>
        </div>
      </div>
    <?php
    }

    $mysqli->close();
    ?>
    </div>
</div>

</body>

</html>