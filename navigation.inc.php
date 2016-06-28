 <?php
            require_once("config.php");

              if(!$fgmembersite->CheckLogin())
              {
?>
<nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">Sky Restaurant</a>
        </div>
      
          <ul class="nav navbar-nav">
            

            <li ><a href="index.php">Home</a></li>
            <li><a href="empty.php">About Us</a></li>
            <li><a href="empty.php">News</a></li>
            <li><a href="empty.php">Events</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="contactus.php">Contact Us</a></li>

            
            <li><a href="login.php">Login</a></li>

                 </ul>
      </div>
       
      
    </nav>

<?php



              }else{
              ?>
              <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">Sky Restaurant</a>
        </div>
      
          <ul class="nav navbar-nav">
            

            <li><a href="index.php">Home</a></li>
            <li><a href="empty.php">About Us</a></li>
            <li><a href="empty.php">News</a></li>
            <li><a href="empty.php">Events</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="contactus.php">Contact Us</a></li>



            <li><a href="logout.php">Logout</a></li>

            <li><a href="admin_login.php">Admin Menu</a></li>
        
          
          </ul>
      </div>
       
      
    </nav>
<?php }?>





