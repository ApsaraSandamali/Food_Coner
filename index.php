<!DOCTYPE html>
<html lang="en">

<head>
  <title>FOOD</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">FOOD CONER</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="about.php">About us </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="contact.php">Contact us </a>
        </li>

      </ul>
    </div>
  </nav>


  <main class="gridcolumn">
    <?php

    // Create connection
    $conn = mysqli_connect("localhost", "root", "", "food_shop");
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, name, ingre, price FROM fooddb";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

      while ($row = $result->fetch_assoc()) {

    ?>
        <form action="" method="post">
          <div class="container grid_container">
            <div class="card shadow-sm">
              <div class="card-body text-center">
                <h1 class="main-heading font-weight: bold"><?php echo $row["name"] ?></h1>
                <p class="px-1">(<?php echo $row["ingre"] ?>)</p>
                <p class="px-1">Rs.<?php echo $row["price"] ?></p>
                <div class="button">
                  <a  class="btn btn-dark" href="remove.php?id=<?php echo $row["id"] ?>">Remove</a>
                  <a  class="btn btn-dark" href="update.php?id=<?php echo $row["id"] ?>">Update</a>
                </div>
              </div>
            </div>
          </div>
        </form>

    <?php

      }
    } else {
      echo "0 results";
    }

    $conn->close();

    ?>
  </main>

  <?php

  // Create connection
  $conn = mysqli_connect("localhost", "root", "", "food_shop");
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT id, name, ingre, price FROM fooddb";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
      $rec_id = $row['id'];
      $rec_name = $row['name'];
      $rec_ingre = $row['ingre'];
      $rec_price = $row['price'];
    }
  } else {
    echo "0 results";
  }

  $conn->close();
  ?>


  <a href="add.php" class="plus plus-button ">
    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="white" class="bi bi-plus" viewBox="0 0 16 16">
      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
    </svg>
  </a>



</body>

</html>