<?php

// Create connection
$conn = mysqli_connect("localhost", "root", "", "food_shop");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, ingre, price FROM fooddb";
$result = $conn->query($sql);

if($result->num_rows > 0){
    echo "<table><tr><th>ID</th><th>Name</th><th>Ingredients</td><td>Price</td></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["ingre"]."</td><td>".$row["price"]."</td></tr>";       
    }
    echo "</table>";
}else{
    echo "0 results";
}




$conn->close();
?>