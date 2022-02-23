<?php

require "connect.php";


$sql = "SELECT * FROM items";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["price"];
    
    echo " (<a href='/show.php?id=".$row["id"]."'>show</a> | ";
    echo " <a href='/update.php?id=".$row["id"]."'>update</a> | ";
    echo " <a href='/delete.php?id=".$row["id"]."'>delete</a>)";
    echo "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();



?>

<br/><br/>
<a href='/create.php'>Create new record</a>