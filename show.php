<?php

require "connect.php";

if(!isset($_GET['id']))
    die("record not found.");

//get id from URL 
$id = $_GET['id'];

// prepare and bind
$stmt = $conn->prepare("SELECT * FROM items WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result(); 

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. "<br/>";
    echo "name: " . $row["name"]. "<br/>";
    echo "description: " . $row["description"]. "<br/>";
    echo "price: " . $row["price"]. "<br/>";
    echo "quantity: " . $row["quantity"]. "<br/>";
    echo "created at: " . $row["created_at"]. "<br/>";
    echo "<br>";
  }
} else {
  echo "record not found.";
}
$conn->close();

echo "<br/><a href='/' >back</a>";


?>