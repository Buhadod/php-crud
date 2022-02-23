<?php

require "connect.php";

if(!isset($_POST['submit']))
{ 

  //get id from URL 
  $id = $_GET['id'];

  // prepare and bind
  $stmt = $conn->prepare("SELECT * FROM items WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result(); 
  $row = $result->fetch_assoc(); //because just one record

?>

<form method='post' action="" >

  <input name='id' type='hidden' value='<?php echo $row['id']; ?>' /> <br/>
  Name : <input name='name' value='<?php echo $row['name']; ?>' /> <br/>
  Descritpion: <textarea name='description'  ><?php echo $row['description']; ?></textarea>  <br/>
  Price :<input type='number' name='price' value='<?php echo $row['price']; ?>' />  <br/>
  Quantity : <input type='number' name='quantity' value='<?php echo $row['quantity']; ?>'/>  <br/>
  <input type='submit' name='submit' value='submit' /> 

</form>



<?php


} 
else {


  $id = $_POST['id'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];

  $sql = "SELECT * FROM items";
  $result = $conn->query($sql);

  // prepare and bind
  $stmt = $conn->prepare("UPDATE items set name=?, description=?, price=?, quantity=? WHERE id=?");
  $stmt->bind_param("ssiii", $name,$description,$price,$quantity,$id);
  $status = $stmt->execute();

  if($status){
    echo "Record update successfully<br/>";
    echo "<a href='/'>Back</a>";
  }
  $conn->close();

}

?>