<?php 
include_once("includes/header.php");

//fetch content from database
include("includes/connection.php"); 
connect_db();

$sql = "SELECT * FROM posts WHERE page_id = 1 ORDER by id DESC LIMIT 5 OFFSET 5"; //6-10
$query = mysqli_query($con, $sql);
 
?>

<hr>

<div class="container">
<?php while($data = mysqli_fetch_assoc($query)){ ?>
<div class="row">

<div class="col-md-offset-2 col-md-8">


<div class="">

<?php 
//checks if an image was uploaded or not
//a random number was generated for each image field
if(!is_numeric($data['image'])){
echo "<img height=\"300px\" width=\"100%\"class=\"img-rounded\" src='uploads/" . $data['image'] . " '>";

}
 
 ?>

 <div class="">
 <h3 class="myheader"><?php echo $data['title']; ?></h3>
 <h1 class="subheading"><?php echo $data['subtitle']; ?></h1>
  <span class="date">
					
<?php echo "Posted on:" . " " . $data['date']; ?>
</span>
 </div>
 
<div class="summary">
<p class="mytext">
 <?php echo nl2br($data['content']); ?>
</p>


</div>



</div>

</div>
</div>
<?php } ?>
</div>
<div class="container-fluid" style="text-align:center;">
<ul class="pagination pagination-sm">
  <li><a href="newsletter.php">1</a></li>
  <li class="active"><a href="newsletter2.php">2</a></li>
  <li><a href="newsletter3.php">3</a></li>
  <li><a href="newsletter4.php">4</a></li>
  <li><a href="newsletter5.php">5</a></li>
  <li><a href="newsletter6.php">6</a></li>
  <li><a href="newsletter7.php">7</a></li>
  <li><a href="newsletter8.php">8</a></li>
  <li><a href="newsletter9.php">9</a></li>
  <li><a href="newsletter10.php">10</a></li>
</ul>
</div>

<?php include_once("includes/footer.php"); ?>

