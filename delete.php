<?php

$conn = mysqli_connect("db.soic.indiana.edu", "i491u16_jpshane", "my+sql=i491u16_jpshane","i491u16_jpshane");
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
 
 
 if (isset($_GET['id']) && is_numeric($_GET['id']))
 {

 $id = $_GET['id'];


 $result = mysqli_query($conn, "DELETE FROM Items WHERE MenuID=".$_GET['id'].""); 
 
 
 // redirect back to the view page
 header("Location: admin_login.php");
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 echo "errored";
 }
 
?>
