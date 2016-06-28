<?PHP

ini_set('display_errors', 'On');
error_reporting(E_ALL);


require_once("config.php");

if(isset($_POST['submitted']))
{
   if($fgmembersite->Login())
   {
        $fgmembersite->RedirectToURL("admin_login.php");
   }
}

require_once 'head.inc.php';
require_once 'header.inc.php';
require_once 'navigation.inc.php';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <link href="style.css" rel="stylesheet">
      <title>Login</title>
    
</head>
<body>

<div id='fg_membersite' class="container">
<form class="form-signin" id='login' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>

<h2 class="form-signin-heading">Login</h2>

<input type='hidden' name='submitted' id='submitted' value='1'/>

    <label for='username' >UserName:</label><br/>
    <input type='text' name='username' id='username' value='<?php echo $fgmembersite->SafeDisplay('username') ?>' /><br/>
    <label for='password' >Password:</label><br/>
    <input type='password' name='password' id='password'/><br/>
   
<br />

    <input class="btn btn-primary" type='submit' name='Submit' value='Submit' />


</form>
</div>
</body>
</html>