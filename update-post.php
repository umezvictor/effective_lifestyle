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

$page_id = "";

	
if(isset($_POST['page'])) {
 
  //page_id
 
 $page_id = $_POST["page_id"];
 header("location:select-title.php?mypageid=$page_id");
   
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



<div class="container" style="height:400px;">
<div class="row">

<div class="col-lg-3 sidebar">
<ul class="list-group">
    <li class="list-group-item"><a href="dashboard.php">Dashboard</a></li>
   <li class="list-group-item"><a href="blog-post.php">Post a new article</a></li>        
    
</ul>
</div>

<div class="col-lg-7">
				<form class="form-horizontal" method="post" action="">
				 
						<div class="form-group">
							<label  class="cols-sm-2 control-label">Select page to update</label>
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
					
                      <div class="form-group ">
							<button class="btn btn-success" type="submit" name="page">Continue</button>
							
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
	
	