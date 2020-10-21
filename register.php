<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    //check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username can no be blank";
    }
    else{
        $sql="SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt,"s",$param_username);

            //Set the value of param username
            $param_username = trim($_POST['username']);

            //try to execute this statement
            
        }
    }
}
