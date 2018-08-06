<?php 
//error_reporting('0');
//connect to the database
/*
cpanel phpmyadmin
database name: mrwhyte
 username: aniekanjoshua234
 password:  LJ-p*!U;~l=_
*/
function connect_db(){
    
    //use global to make $con reusable  anywhere outside this function
    global $con;
    
    $host = "localhost";
    $username = "victor";
    $password = "blaze";
    $database = "mrwhyte";
    
    $con = mysqli_connect($host, $username, $password, $database);
    if(mysqli_connect_errno()){
       echo "database connection failed" . mysqli_error();
    }
    
    
}



?>