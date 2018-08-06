<?php

include("includes/connection.php"); 
connect_db();


if(isset($_GET['client_id'])){
    $client_id = $_GET['client_id'];
    
    $sql = "DELETE FROM clients WHERE id='$client_id'";
   $result = mysqli_query($con, $sql);
    
    if($result){
      
       header("location:dashboard.php");
    }
   
}

?>