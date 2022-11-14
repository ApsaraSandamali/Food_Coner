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
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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

  <section class="my-4">
  <div class="py-4">
    <h2 class="text-center">ADD FOOD TO THE MENU</h2>
  </div>

  <div class="w-50 m-auto">
    <form action="" method="post">
    
      <div>
        <label>Name:</label>
        <input type="text" name="name" class="form-control">
      </div>
      <div>
        <label>Ingredients:</label>
        <input type="text" name="ingre" class="form-control">
      </div>
      <div>
        <label>Price:</label>
        <input type="number" name="price" class="form-control"> <br>
      </div>
      <div>
        <input name="submit" type="submit" class="btn btn-success"></input>
      </div>
    </form>
  </div>
</section>
</body>
</html>

  <?php 
  if(isset($_POST["submit"])){
    $conn = mysqli_connect("localhost", "root", "", "food_shop");
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
        
        //Taking all 3 values from the form data(input)
        $id =  $_POST['id'];
        $name =  $_POST['name'];
        $ingre = $_POST['ingre'];
        $price =  $_POST['price'];
         
        // Performing insert query execution
        // here our table name is food
        $sql = "INSERT INTO fooddb  VALUES ('$id', '$name', '$ingre', '$price')";
         
        if(mysqli_query($conn, $sql)){
            header('location:index.php');
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

         
        // Close connection
        mysqli_close($conn);
  }
    
?>