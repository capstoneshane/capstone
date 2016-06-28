<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

 function renderForm($item, $price, $description, $category, $error)
 {
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>New Menu Item</title>
 <link href="style.css" rel="stylesheet">
 </head>
 <body class="container">
 <?php 
 // if there are any errors, display them
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 
 
 <form action="" method="post" class="form-signin">
 <div>
 <strong>Item </strong> <input type="text" name="item" value="<?php echo $item; ?>" /><br/>
 <strong>Price </strong> <input type="text" name="price" value="$" /><br/>
 <strong>Description </strong> <input type="text" name="description" value="<?php echo $description; ?>" /><br/>
 <strong>Category </strong>
  <select name="category">
 	<option value="Starter">Starter</option>
 	<option value="Drink">Drink</option>
 	<option value="Sandwich">Sandwich</option>
 	<option value="Salad">Salad</option>
 	<option value="Entree">Entree</option>
 	<option value="Dessert">Dessert</option>
 </select>


 <input class="btn btn-primary" type="submit" name="submit" value="Submit">
 </div>
 </form> 
 </body>
 </html>
 
 
 <?php 
 }
 
 
 
    
$conn = mysqli_connect("db.soic.indiana.edu", "i491u16_jpshane", "my+sql=i491u16_jpshane","i491u16_jpshane");
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
 
 if (isset($_POST['submit']))
 { 

 $item = mysqli_real_escape_string($conn, $_POST['item']);
 $price = mysqli_real_escape_string($conn, $_POST['price']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
 


 if ($item == '' || $price == '' || $description == '' || $category == '')
 {

 $error = 'ERROR: Please fill in all required fields!';
 
 
 renderForm($item, $price, $description, $category, $error);
 }
 else
 {

  mysqli_query($conn, "INSERT Items SET Item='$item', Price='$price', 
  Description='$description',Category='$category'"); 
 
 
 header("Location: admin_login.php"); 
 }
 }
 else

 {
 renderForm('','','','','');
 }
?>