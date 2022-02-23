<?php

require "connect.php";

if(!isset($_GET['id']))
    die("record not found.");

//get id from URL 
$id = $_GET['id'];

// prepare and bind
$stmt = $conn->prepare("DELETE FROM items WHERE id = ?");
$stmt->bind_param("i", $id);
$status = $stmt->execute();

if($status){
  echo "Record deleted sucessfully <br/>";
}

$conn->close();

echo "<br/><a href='/' >Back</a>";


?>