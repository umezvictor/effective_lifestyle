<?php 

session_start();
$user_email = $_SESSION['email'];

$_SESSION['login_error'] = "";
//redirect user if not logged in
if(!isset($_SESSION['email'])){
	header('location:admin.php');
    
	$_SESSION['login_error'] = "<div class=\"alert alert-danger\">
	<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
	You need to login first
	</div>";
} 


?>



<?php 
include("includes/connection.php"); 
connect_db();

$sql2 = "SELECT fullname FROM admin WHERE email = '$user_email'";
$query2 = mysqli_query($con, $sql2);

$row2 = mysqli_fetch_assoc($query2);

$page_id = $title = $subtitle = $content = $image = "";

$title_err = $content_err = $img_err = "";

$error_msg = $success_msg = "";
	
if(isset($_POST['publish'])) {
 
  //page_id
 
    $page_id = test_input($_POST["page_id"]);
   
 
  //title
 if (empty($_POST["title"])) {
    $title_err = "Enter the title";
  } else {
    $title = test_input($_POST["title"]);
    // check if name only contains letters and whitespace
   
    if(str_word_count($title) == 0){
        $title_err = "white spaces are not allowed";
    }
  }
  
  //subtitle: optional
 
    $subtitle = test_input($_POST["subtitle"]);
    
  
  //content
 if (empty($_POST["content"])) {
    $content_err = "You can't leave it empty";
  } else {
    $content = test_input($_POST["content"]);
    
   
    if(str_word_count($content) == 0){
        $content_err = "white spaces are not allowed";
    }
  }
    
    //the date which the content was posted
	$date = date("l jS \of F Y");
  

	//random numbers to identify each post image
	$image_id = mt_rand();
	

//random numbers btw 10 and 100echo(mt_rand(10,100));
   
$file_name = $_FILES['image']['name'];
	//here i appended the image id to the filename to make it unique
	
	$file_name = $image_id . $file_name;
	$file_size = $_FILES['image']['size'];
	$uploaded_file = $_FILES['image']['tmp_name'];

	$temp = explode(".", $_FILES["image"]["name"]);
    $extension = end($temp);
	
	//create the allowed extensions
    $allowed = array("gif", "jpg", "jpeg", "png");
	
if((
$_FILES['image']['type'] == "image/gif" || 
$_FILES['image']['type'] == "image/jpg" || 
$_FILES['image']['type'] == "image/jpeg" ||
$_FILES['image']['type'] == "image/png" 
) && ($file_size < 2097152) && (in_array($extension, $allowed))){
	move_uploaded_file($uploaded_file, "uploads/".$file_name);	
}
	
//making sure files don't upload while other form field are empty
if($title_err == '' and $content_err == '' and $img_err == '')	{
    
		
 $query = "INSERT INTO posts (page_id, title, subtitle, content, 
 image, date) VALUES ('$page_id', '$title', '$subtitle', '$content', 
 '$file_name', '$date')";

mysqli_query($con, $query);
   //pass the email to  the staff_profile page and use it to fetch records   
	$success_msg = "<div class=\"alert alert-success\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        Your article has been published
        </div>";
		
	}else{
		$error_msg = "<div class=\"alert alert-danger\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        Your article could not be published, please try again
        </div>";
    }
  


}


//sanitize input
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  
  return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Living an Effective Lifestyle Inc.</title>
		 <link rel="stylesheet" href="./css/bootstrap.min.css"> 
		 
		<link rel="stylesheet" href="./css/custom.css">	
			
		
		<script src="https://use.fontawesome.com/80ed8cb158.js"></script>

		<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
       
	   
		
	</head>
	
	
	
	<body>
	
	<nav class="navbar navbar-new navbar" role="navigation">
    <div class="container-fluid">
        <!-- logo -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
        </div>
		
		<p class="navbar-text"><span><i class="fa fa-envelope" aria-hidden="true"></i>  Support: victorblaze2010@gmail.com</span></p>
		
        <!-- menu -->
        <div class="collapse navbar-collapse navbar-right" id="navbar1">
            <ul class="nav navbar-nav">
                <li class=""><a href="#"><?php echo "Welcome " . $row2['fullname']; ?></a></li>
				<li class=""><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>



<div class="container" style="margin-top:20px; margin-bottom:20px">
<div class="row">

<div class="col-lg-3 sidebar">
<ul class="list-group">
    <li class="list-group-item"><a href="dasboard.php">Dashboard</a></li>
   <li class="list-group-item"><a href="update-post.php">Update an article</a></li>        
    
</ul>
</div>

<div class="col-lg-7">
<div id="messages">
<?php echo $success_msg; ?> 
 <?php echo $error_msg; ?> 
					   
</div>							
	<form class="form-horizontal" method="post" action="blog-post.php" enctype="multipart/form-data">
				 
						<div class="form-group">
							<label  class="cols-sm-2 control-label">Select page</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
									<select name="page_id" class="form-control">
									<option value="1">Newsletter</option>
									<option value="2">Words in season</option>
									</select>
                                    
                                </div>
								
							</div>
						</div>
						
						<div class="form-group">
							<label class="cols-sm-2 control-label">Title</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="title" placeholder="Title of article" required/>
                                    
                                </div>
								<p style="color:red"><?php echo $title_err; ?></p>
							</div>
						</div>
						
						<div class="form-group">
							<label class="cols-sm-2 control-label">SubTitle</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="subtitle" placeholder="optional"/>
                                    
                                </div>
								
							</div>
						</div>

                        <div class="form-group">
							<label  class="cols-sm-2 control-label">Content</label>
							<div class="cols-sm-10">
								<div class="input-group">

							<textarea rows="20" cols="100" class="form-control" name="content" placeholder="Type your article here" required></textarea>
                                    
                                </div>
								<p style="color:red"><?php echo $content_err; ?></p>
							</div>
						</div>


                        
                                	  <!--upload company logo -->
				<div class="form-group">
						<label class=" cols-sm-2 control-label">Upload image (optional): </label>
							<div class="cols-sm-10">	
							<input type="file" class="form-control" name="image" />
						
						</div>
					<p style="color:red"><?php echo $img_err; ?></p>
				</div>
                                
           
                      <div class="form-group ">
							<button class="btn btn-success" type="submit" name="publish">Publish</button>
							<a href="http://www.livinganeffectivelifestyle/blog-post.php" target="blank" class="btn btn-info">Preview</a>
						</div>
						
                         
					</form>
				
					

</div>
</div>

</div>

















<footer>

<div class="container">

<div class="row" style="margin-top: 40px;">
<div class="col-sm-6">
<p class="copyright">&copy; Copyright 2017. Living an Effective Lifestyle Inc</p>
</div>

</div>
</div><!--end of container-->

</footer>

	
</body>
</html>
	
	