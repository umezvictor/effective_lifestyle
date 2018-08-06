<?php
//create conecttion to db
include("includes/connection.php"); 
connect_db();

//declare variables
$firstname = $lastname = $email = $phone = $skype = "";
$country = $city = $biggest_challenge = $present_challenge = "";

//errors
$fname_err = $lname_err = $email_err = $phone_err = "";
$country_err = $city_err = $bchal_err = $pchal_err = "";

$success_msg = "";
$error_msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	
	   // firstname
  if (empty($_POST["firstname"])) {
    $fname_err = "required";
  } else {
    $firstname = test_input($_POST["firstname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
      $fname_err = "Invalid name"; 
    }
    if(str_word_count($firstname) == 0){
        $fname_err = "white spaces are not allowed";
    }
  }

     //2 lastname
  if (empty($_POST["lastname"])) {
    $lname_err = "required";
  } else {
    $lastname = test_input($_POST["lastname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
      $lname_err = "Invalid name"; 
    }
    if(str_word_count($lastname) == 0){
        $lname_err = "white spaces are not allowed";
    }
  }
  
   
  //email
  if (empty($_POST["email"])) {
    $email_err = "Your email is required";
  } else {
    $email = test_email($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_err = "Invalid email format"; 
    }
    if(str_word_count($email) == 0){
        $email_err = "white spaces are not allowed";
    }
  }

   //7 phone 
  if(empty($_POST["phone"])){
  $phone_err = "Your phone number is required";
  }else{
    $phone = test_input($_POST["phone"]);
    if (!preg_match('/^[0-9]*$/',$phone)) {
      $phone_err = "only digits are allowed"; 
    }
    if(strlen($phone) < 5 ){
        $phone_err = "Your phone number appears to be incorrect";
        }
        
    }
	
	 //skype username is optional
  
    $skype = test_input($_POST["skype"]);
    
   //country
   
  if(empty($_POST["country"])) {
   $country_err = "choose your country";
    
  }else{
  $country = test_input($_POST["country"]); 
  }
        
       //city
  if (empty($_POST["city"])) {
    $city_err = "required";
  } else {
    $city = test_input($_POST["city"]);
   
    if(str_word_count($city) == 0){
        $city_err = "white spaces are not allowed";
    }
  }

 //biggest challenge
   
  if(empty($_POST["biggest_challenge"])) {
   $bchal_err = "please choose one";
    
  }else{
  $biggest_challenge = test_input($_POST["biggest_challenge"]); 
  }

//present challenge
   
  if(empty($_POST["present_challenge"])) {
   $pchal_err = "please choose one";
    
  }else{
  $present_challenge = test_input($_POST["present_challenge"]); 
  } 



if ($fname_err == '' && $lname_err == '' && $email_err == '' && 
$phone_err == '' && $country_err == '' && 
$city_err == '' && $bchal_err == '' && $pchal_err == '') {
	
	//insert records
	$query = "INSERT INTO clients (firstname, lastname, email, 
	phone, skype, country, city, biggest_challenge, present_challenge) 
	VALUES ('$firstname', '$lastname', '$email', '$phone', '$skype', 
	'$country', '$city', '$biggest_challenge', '$present_challenge')";
	
	if(mysqli_query($con, $query)){
		
		$success_msg = "<div class=\"alert alert-success\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        Thanks for being in touch, we'll contact you shortly
        </div>"; 
	}else{
		$error_msg = "<div class=\"alert alert-danger\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        Oops, something went wrong. Please try again later
        </div>";
	}
} 

//endoffile  
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = ucwords($data);
  return $data;
}

function test_email($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = strtolower($data);
  return $data;
}

?>