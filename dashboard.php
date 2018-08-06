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

//retrieving the user's records from db
$sql = "SELECT * FROM clients";
$query = mysqli_query($con, $sql);

$sql2 = "SELECT fullname FROM admin WHERE email = '$user_email'";
$query2 = mysqli_query($con, $sql2);

$row2 = mysqli_fetch_assoc($query2);
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
       
	   <!--below is used for datatable plugin-->
		<link rel="stylesheet" href="http://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
		<script src="js/jquery-2.1.4.min.js"></script>
        <script src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        
		<script>
		$(document).ready(function() {
    $('#clients').DataTable( {
        "paging":   true,
        "ordering": false,
        "info":     true
    } );
} );
		</script>
		
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
<h1 class="myheader" style="text-align:center;">Free Consultation Clients</h1>
<div class="col-lg-3 sidebar">
<ul class="list-group">
    <li class="list-group-item"><a href="blog-post.php">Post a new article</a></li>
   <li class="list-group-item"><a href="update-post.php">Update an article</a></li>        
    
</ul>
</div>

<div class="col-lg-9">

<div class="table-responsive">
<table id="clients" class="table table-striped">
<thead>
<tr style="color: #008000">
<th>First name</th>
<th>Last name</th>
<th>Email</th>
<th>Phone</th>
<th>Skype username</th>
<th>Country</th>
<th>City/State/Province</th>
<th>Biggest challenge</th>
<th>Present challenge</th>
<th>Delete Record</th>
</tr>
</thead>

<tbody>
    
<?php
 while($row = mysqli_fetch_assoc($query)){

?>

<tr> 
<td><?php echo $row['firstname']; ?></td> 
<td><?php echo $row['lastname']; ?></td>
 <td><?php echo $row['email']; ?></td>
 <td><?php echo $row['phone']; ?></td> 
<td><?php echo $row['skype']; ?></td>
<td><?php echo $row['country']; ?></td>
<td><?php echo $row['city']; ?></td>
<td><?php echo $row['biggest_challenge']; ?></td>
<td><?php echo $row['present_challenge']; ?></td>
<td><button onclick="return confirm('Are you sure you want to delete this item?'); "><a href="delete_client.php?client_id=<?php echo $row['id']; ?>" style="color:red"><i class="fa fa-trash-o" aria-hidden="true"></i></a></button></td>
</tr>
    
<?php 
 }
 ?>
    
</tbody>
</table>
</div>

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
	
	