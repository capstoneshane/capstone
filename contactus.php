<?php
require_once 'head.inc.php';
require_once 'header.inc.php';
require_once 'navigation.inc.php';
?>

<h1>Contact Us</h1>
<h2>Send e-mail to shanecapstone16@gmail.com:</h2>

<div class="container">
<form action="" method="post" class="form-signin">
First Name: <input type="text" name="first_name"><br>
Last Name: <input type="text" name="last_name"><br>
Email: <input class="submission" type="text" name="email"><br>
Message:<br><textarea rows="5" name="message" cols="30"></textarea><br>
<input type="submit" class="btn btn-primary" name="submit" value="Submit">
</form>
</body>
</html>
</div>

<?php 
if(isset($_POST['submit'])){
    $to = "shanecapstone16@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>

<html>
<body>
<h3>Please come visit us in Bloomington!</h3>
</body>
<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:443px;width:700px;'><div id='gmap_canvas' style='height:443px;width:700px;'></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small><a href="https://termsandcondiitionssample.com">terms and conditions generator</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(39.1696922,-86.53395160000002),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(39.1696922,-86.53395160000002)});infowindow = new google.maps.InfoWindow({content:'<strong>Sky Restaurant</strong><br>403 N Walnut Street, Bloomington, IN 47404<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
</html>

 
