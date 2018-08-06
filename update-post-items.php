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

//define variables


	
if(isset($_GET['article'])) {
 
 //fetch article
 $article_title = $_GET['article'];
 
 //fetch records to update
 $fetch_article = "SELECT * FROM posts WHERE title = '$article_title'";
 $fetch_query = mysqli_query($con, $fetch_article);
 $items = mysqli_fetch_assoc($fetch_query);
 
 $title = $items['title'];
 $subtitle = $items['subtitle'];
 $content = $items['content'];
}

$title_err = $content_err = "";

$error_msg = $success_msg = "";

if(isset($_POST['update'])){
   
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
    
	
//making sure files don't upload while other form field are empty
if($title_err == '' and $content_err == '')	{
    
		
 $update_query = "UPDATE posts SET title = '$title',
 subtitle = '$subtitle', content = '$content' WHERE title = '$article_title'";

mysqli_query($con, $update_query);

//alert message and populate the form with the updated content
echo "<script>
alert('Your article has been successfully updated.');
window.location='update-post-items.php?article=".$title."'
</script>";

//$success_msg = 'ok';
//header("location:update-post-items.php?article=$title");//reset the title

//pass the email to  the staff_profile page and use it to fetch records   
	
		}else{
		$error_msg = "<div class=\"alert alert-danger\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        Your article could not be updated, please try again
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
    <li class="list-group-item"><a href="dashboard.php">Dashboard</a></li>
   <li class="list-group-item"><a href="blog-post.php">Post a new article</a></li>        
    
</ul>
</div>

<div class="col-lg-7">
<div id="messages">

 <?php echo $error_msg; ?> 
					   
</div>							
<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
				 
						<div class="form-group">
							<label class="cols-sm-2 control-label">Title</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
									<input type="text" class="form-control"
									name="title" value="<?php echo $items['title'];?>" required/>
                                    
                                </div>
								<p style="color:red"><?php echo $title_err; ?></p>
							</div>
						</div>
						
						<div class="form-group">
							<label class="cols-sm-2 control-label">SubTitle</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="subtitle"
									value="<?php echo $items['subtitle'];?>" placeholder="optional"/>
                                    
                                </div>
								
							</div>
						</div>

                        <div class="form-group">
							<label  class="cols-sm-2 control-label">Content</label>
							<div class="cols-sm-10">
								<div class="input-group">

							<textarea rows="20" cols="100" class="form-control" 
							name="content" required><?php echo $items['content'];?></textarea>
                                    
                                </div>
								<p style="color:red"><?php echo $content_err; ?></p>
							</div>
						</div>

                      <div class="form-group ">
					<button class="btn btn-success" type="submit" name="update">Publish</button>
							
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
	
	