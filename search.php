<?php 
//include header
include("includes/header.php");
?>
<div class="row">
	<div class="col-md-12">
		<h1>Search</h1>
			<form id="myform" class="col-md-3" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
			<div class="form-group">
				<label for="searchterm">Search Term:</label>
				<input type="text" name="searchterm" class="form-control" value="<?php echo $_POST['searchterm']; ?>">
			</div>
			</div>

			<div class="form-group">
				<label for="submit">&nbsp;</label>
				<input type="submit" name="submit" class="btn btn-info" value="Submit">
			</div>
		</form>


	<?php 
	if (isset($_POST['submit']) && (strlen($_POST['searchterm']) > 1)) {
		$searchterm = $_POST['searchterm'];
		//echo $searchterm;
		
		//search for.. print
		echo "<h3>Search Results for '$searchterm'</h3>";
		//search terms on character db
		$sql = "SELECT * FROM blogapp WHERE 
		blogtitle LIKE '$searchterm'
		OR blogentry LIKE '%$searchterm%'";

		$result = mysqli_query($con, $sql) or die(mysqli_error($con));

		//testing - did we find anything?
		if (mysqli_num_rows($result) > 0) {
			//next, we need to loop through the query to show results
			while ($row = mysqli_fetch_array($result)) {
				$btitle = $row['blogtitle'];
				$bentry= nl2br($row['blogentry']);
				$blogtimedate = $row ['blogtimedate'];

				echo "\n <div class=\"well\">";
				echo "\n\t<h3>$btitle | $blogtimedate</h3>";
				echo "\n\t<div class=\"description\">$bentry</div>";
				echo "\n</div>\n\n";
			} //while loop
		} else {
			echo "<p class=\"alert alert-info col-md-3\">Your search has no result</p>";
		} //elseif
	} //isset

	?>

	</div>
</div>

<?php 
//include footer
include("includes/footer.php");
?>