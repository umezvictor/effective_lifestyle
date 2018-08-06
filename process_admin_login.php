<?php 
session_start();
//admin login details
//#dianawhyte2018=+   dianadeewhyte@gmail.com  diana whyte
//#aniekanjoshua2018=+ info@livinganeffectivelifestyle.com  aniekan whyte
include("includes/connection.php"); 
connect_db();

$_SESSION['error'] = "";

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT email, password FROM admin WHERE email = '$email' && password = '$password'";
    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_assoc($result);

    $db_email = $row['email'];
    $db_password = $row['password'];

    if($email == $db_email && $password == $db_password){

        //set cookie for 7 days
        if(isset($_POST['remember'])){
            setcookie('email', $email, time()+60*60*7);
            setcookie('password', $password, time()+60*60*7);
        }
//preserving user state with sessions
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;

        header('location: dashboard.php');
   
    }else{
        header("location: admin.php?user_email=1");
        $_SESSION['error'] = "<div class=\"alert alert-danger\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        invalid email or password
        </div>";
        

       
    }
    
}






?>