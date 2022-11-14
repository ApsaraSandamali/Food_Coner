<?php

// Create connection
$conn = mysqli_connect("localhost", "root", "", "food_shop");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$id = $_GET['id']; 
$stmt = $conn->prepare('DELETE FROM fooddb WHERE id = ?');
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

header('location:index.php');

$conn->close();
?>