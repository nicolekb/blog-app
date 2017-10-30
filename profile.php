<?php 
//include header
include("includes/header.php");
?>

<div class="row">
	<div class="col-md-6">
<?php
	$blog_id = $_GET['bid'];

	$result2 = mysqli_query($con, "SELECT * FROM blogapp WHERE bid = '$blog_id'") or die(mysqli_error($con));

	while ($row = mysqli_fetch_array($result2)) {
		$blog_id = $row['bid'];
		$btitle = $row['blogtitle'];
		$bentry = $row['blogentry'];
	}

?>

	</div>
</div>

<div class="row col-md-10">
	<?php 
		echo "<h2>Team Name:</h2></br>" . $btitle . "</br>";
		echo "<hr>";
		echo "<h2>Team Info:</h2></br>" . $bentry . "</br>";
	 ?>

</div>



<?php 
//include footer
include("includes/footer.php");
?>
