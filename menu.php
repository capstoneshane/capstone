<?php



require_once 'head.inc.php';
require_once 'header.inc.php';
require_once 'config.php';

$results = $fgmembersite->menuTable(); 

if(!$fgmembersite->CheckLogin())
{


?>
<h2>Menu</h2>

<?php

	echo "<table class='table'><tr><th>Item</th><th>Price</th><th>Description</th><th>Category</th></tr>";


foreach($results as $row) { 
    
	echo" 
    
    	<tr>
    	<td>".$row["Item"]."</td>
    	<td>".$row["Price"]."</td>
    	<td>".$row["Description"]."</td>
		<td>".$row["Category"]."</td>
		
		</tr>
		</tr>";
	}
	echo "</table>";
?>
	</body>
</html>
    
<?php }else{ ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <link href="style.css" rel="stylesheet">
      <title>Admin Menu</title>

      <script>
function toggle() {
 if( document.getElementById("hidethis").style.display=='none' ){
   document.getElementById("hidethis").style.display = 'table-row'; // set to table-row instead of an empty string
 }else{
   document.getElementById("hidethis").style.display = 'none';
 }
}
	</script>
      
</head>
<body class="container">
<div id='fg_membersite_content'>
<h2>Admin Menu</h2>
Welcome <?= $fgmembersite->UserFullName(); ?>!


<p><br /><a href='new.php'>Add New Item <img src='add.png' style='max-width:40px;'></a></p>

<?php

	echo "<table class='table'><tr><th>Item</th><th>Price</th><th>Description</th><th>Category</th><th>Display</th><th>Delete</th><th>Edit</th></tr>";


foreach($results as $row) { 
    
	echo" 
    
    	<tr id='hidethis'>
    	<td>".$row["Item"]."</td>
    	<td>".$row["Price"]."</td>
    	<td>".$row["Description"]."</td>
		<td>".$row["Category"]."</td>
		<td>
		<a href='#' onclick='toggle()'>Toggle
		</a>
		</td><td><a href='delete.php?id=".$row["MenuID"]."''><img src='delete.png' style='max-width:40px;'></a></td>
		<td>
		<a href='edit.php?id=".$row["MenuID"]."'><img src='edit.png' style='max-width:40px;'></a>
		</td>
		</tr>
		</tr>";
	}
	echo "</table>";
?>


</div>
</body>
</html>




<?php }?>


