<?php

require "connect.php";

if(!isset($_POST['submit']))
{ 

?>

<form method='post' action="" >

  Name : <input name='name' /> <br/>
  Descritpion: <textarea name='description' ></textarea>  <br/>
  Price :<input type='number' name='price' />  <br/>
  Quantity : <input type='number' name='quantity'/>  <br/>
  <input type='submit' name='submit' value='submit' /> 

</form>



<?php


} 
else {


  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];

  $sql = "SELECT * FROM items";
  $result = $conn->query($sql);

  // prepare and bind
  $stmt = $conn->prepare("INSERT into items (name, description, price, quantity) VALUES (?,?,?,?)");
  $stmt->bind_param("ssii", $name,$description,$price,$quantity);
  $status = $stmt->execute();

  if($status){
    echo "New record created successfully<br/>";
    echo "<a href='/'>Back</a>";
  }
  $conn->close();

}

?>