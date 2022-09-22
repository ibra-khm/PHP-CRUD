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
    <form action="insert.php" method="post">
      <div class="mb-3">
        <label class="form-label">Car Image</label>
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
                <a href="edit.php?carid=" class="btn btn-dark" style="float:right;" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $car['carid'] ?>">Edit</a>
                <a href="delete.php?carid=<?php echo $car['carid']; ?>" class="btn btn-danger">Delete</a>
            </div>
        </div>
          <div class="modal fade" id="exampleModal<?php echo $car['carid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                    <form action="edit.php?carid=<?php echo $car['carid']; ?>" method="post">
                      <div class="container p-5 text-center w-75">
                        <h1 class="text-danger">Edit Car : </h1>
                          <div class="mb-3">
                            <label for="form2" class="form-label">Change Image:</label>
                            <input value="<?php echo $car["img"] ?>" type="url" name="img2" id="form2" class="form-control" required>
                          </div>
                          <div class="mb-3">
                          <label for="model2" class="form-label">Change Model:</label>
                                <input value="<?php echo $car["model"] ?>" type="text" class="form-control" name="model2" id="model2" required />
                          </div>
                          <div class="mb-3">
                          <label for="price2" class="form-label">Change Price:</label>
                                <input value="<?php echo $car["price"] ?>" type="number" class="form-control" name="price2" id="price2" required />
                          </div>
                          <div class="mb-3">
                                <label for="color2" class="form-label">Change Color:</label>
                                <input value="<?php echo $car["color"] ?>" type="text" class="form-control" name="color2" id="color2" required />
                          </div>
                          <button type="submit" class="btn btn-primary w-75">Submit</button>
                        </div>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

          </div>
    </div>
  </div>
    <?php
    }

    $mysqli->close();
    ?>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>