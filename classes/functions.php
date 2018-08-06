<?php


ini_set( 'session.use_only_cookies', TRUE );
/*
ini_set( 'session.use_only_cookies', TRUE );
forces PHP to manage the session ID with a cookie only, so that your script never
 considers $_GET['PHPSESSID'] to be valid. This automatically overrides the use of
  transparent session IDs. 
*/				
ini_set( 'session.use_trans_sid', FALSE );
/*
ini_set( 'session.use_trans_sid', FALSE );
avoids leaking the session ID in all URIs returned in the first response, 
before PHP discovers whether the browser is capable of using a session cookie 
or not.This technique protects users from accidentally revealing their session IDs,
 but it is still subject to DNS and proxy attacks.
*/

$session_id = sha1('norabel');
session_id($session_id);

//$session_name = ('mysite'); doesn't work, take note
//session_name($session_name);doesn't work, take note


session_start();

require_once "classes/DB.php";

class Functions extends DB{
    public $error;

  

    public function checklogin($user, $pass, $remember){
      $sql = "SELECT * FROM myadmin WHERE username = '$user' && password = '$pass'";
      $result = mysqli_query($this->con, $sql);

        $rows = mysqli_fetch_assoc($result);
        $dbuser = $rows['username'];
        $dbpass = $rows['password'];

        if(isset($remember)){
            setcookie('myuser', $dbuser, time()+60*20);//cookie expires after 20 minutes
        }

        if($dbuser == $user && $dbpass == $pass){
            // if authenticated, generate a new random session ID
            
            session_regenerate_id();
            $_SESSION['user'] = $dbuser;
            header("location:cpanel/admin.php");
        }else{
           $_SESSION['error'] = "<div class=\"alert alert-danger\">
                <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                invalid username or password
                </div>";
            header("location:login.php");
        }
    }

    
}