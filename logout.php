<?php
session_start();

session_destroy();
if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
    $email = $_COOKIE['email'];
    $password = $_COOKIE['password'];
    //clear the cookie by backdating the validity 
    setcookie('email', $email, time()-3600);
    setcookie('password', $password, time()-3600);
}
//we shall use the get value of logged out to create a logout notification on other pages like the login page for example
header("location: admin.php?logged_out=yes");



 ?>