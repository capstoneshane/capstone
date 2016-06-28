<?PHP


class FGMembersite_2
{
    var $admin_email;
    var $from_address;
    
    var $username;
    var $pwd;
    var $database;
    var $tablename;
    var $connection;
    var $rand_key;
    
    var $error_message;
    
    //-----Initialization -------
    function FGMembersite()
    {
        $this->sitename = 'db.soic.indiana.edu';
        $this->rand_key = '0iQx5oBk66oVZep';
    }
    
    function InitDB($host,$uname,$pwd,$database,$tablename)
    {
        $this->db_host  = $host;
        $this->username = $uname;
        $this->pwd  = $pwd;
        $this->database  = $database;
        $this->tablename = $tablename;
        
    }
   
    
    function SetWebsiteName($sitename)
    {
        $this->sitename = $sitename;
    }
    
    function SetRandomKey($key)
    {
        $this->rand_key = $key;
    }
    
    //-------Main Operations ----------------------
    
    function Login()
    {
        
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        
        if(!isset($_SESSION)){ session_start(); }
        if(!$this->CheckLoginInDB($username,$password))
        {
            return false;
        }
        
        $_SESSION[$this->GetLoginSessionVar()] = $username;
        
        return true;
    }
    
    function CheckLogin()
    {
         if(!isset($_SESSION)){ session_start(); }

         $sessionvar = $this->GetLoginSessionVar();
         
         if(empty($_SESSION[$sessionvar]))
         {
            return false;
         }
         return true;
    }
    
    function UserFullName()
    {
        return isset($_SESSION['name_of_user'])?$_SESSION['name_of_user']:'';
    }
    
    function UserEmail()
    {
        return isset($_SESSION['email_of_user'])?$_SESSION['email_of_user']:'';
    }
    
    function LogOut()
    {
        session_start();
        
        $sessionvar = $this->GetLoginSessionVar();
        
        $_SESSION[$sessionvar]=NULL;
        
        unset($_SESSION[$sessionvar]);
    }
    
    
    //-------Public Helper functions -------------
    function GetSelfScript()
    {
        return htmlentities($_SERVER['PHP_SELF']);
    }    
    
    function SafeDisplay($value_name)
    {
        if(empty($_POST[$value_name]))
        {
            return'';
        }
        return htmlentities($_POST[$value_name]);
    }
    
    function RedirectToURL($url)
    {
        header("Location: $url");
        exit;
    }
    
   
    //-------Private Helper functions-----------
  
    function HandleDBError($err)
    {
        $this->HandleError($err."\r\n mysqlerror:".mysqli_error());
    }
    
   
    
    function GetLoginSessionVar()
    {
        $retvar = md5($this->rand_key);
        $retvar = 'usr_'.substr($retvar,0,10);
        return $retvar;
    }
    
    function CheckLoginInDB($username,$password)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }          
        $username = $this->SanitizeForSQL($username);
        $pwdmd5 = md5($password);
        $qry = "Select userName, passWord from $this->tablename where userName='$username' and passWord='$pwdmd5'";
        
        $result = mysqli_query($this->connection, $qry);
        
        if(!$result || mysqli_num_rows($result) <= 0)
        {
            $this->HandleError("Error logging in. The username or password does not match");
            return false;
        }
        
        $row = mysqli_fetch_assoc($result);
        
        
        $_SESSION['name_of_user']  = $row['userName'];
        $_SESSION['email_of_user'] = $row['passWord'];
        
        return true;
    }
    
   
  
    
   
    
   
    
    function DBLogin()
    {

        $this->connection = mysqli_connect($this->db_host,$this->username,$this->pwd,$this->database);

        if(!$this->connection)
        {   
            $this->HandleDBError("Database Login failed! Please make sure that the DB login credentials provided are correct");
            return false;
        }
        if(!mysqli_select_db($this->connection,$this->database))
        {
            $this->HandleDBError('Failed to select database: '.$this->database.' Please make sure that the database name provided is correct');
            return false;
        }
        if(!mysqli_query($this->connection,"SET NAMES 'UTF8'"))
        {
            $this->HandleDBError('Error setting utf8 encoding');
            return false;
        }
        return true;
    }    
    



    function menuTable()
    {
        
        $qry = ("SELECT MenuID, Item, Price, Description, Category FROM Items;");

        $con = mysqli_connect("db.soic.indiana.edu", "i491u16_jpshane", "my+sql=i491u16_jpshane","i491u16_jpshane");

        $result = $con->query($qry);

        
        //$row = mysqli_fetch_assoc($result);

        $res = array();
        while($row = mysqli_fetch_assoc($result)) {
            $res[] = $row;
        }
        
       
    return $res;
 
    }
    

   
    function SanitizeForSQL($str)
    {
        if( function_exists( "mysqli_real_escape_string" ) )
        {
              $ret_str = mysqli_real_escape_string($this->connection, $str );
        }
        else
        {
              $ret_str = addslashes( $str );
        }
        return $ret_str;
    }
    

}
?>