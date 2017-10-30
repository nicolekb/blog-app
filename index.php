<?php 
//header include
include('includes/header.php');
//funcions
include("includes/_functions.php");
?>

<?php 
//////////// pagination
$getcount = mysqli_query ($con,"SELECT COUNT(*) FROM blogapp");

$postnum = mysqli_result($getcount,0);// this needs a fix for MySQLi upgrade; see custom function below

$limit = 5;

if($postnum > $limit){
	$tagend = round($postnum % $limit,0);
	$splits = round(($postnum - $tagend)/$limit,0);

	if($tagend == 0){
		$num_pages = $splits;
	}	else{
			$num_pages = $splits + 1;
	}

	if(isset($_GET['pg'])){
		$pg = $_GET['pg'];
	}	else{
		$pg = 1;
	}

	$startpos = ($pg*$limit)-$limit;
	$limstring = "LIMIT $startpos,$limit";

}	else{
	$limstring = "LIMIT 0,$limit";
}

// MySQLi upgrade: we need this for mysql_result() equivalent
function mysqli_result($res, $row, $field=0) { 
    $res->data_seek($row); 
    $datarow = $res->fetch_array(); 
    return $datarow[$field]; 
}
//////////////
?>



<?php
	//ORDER BY bid DESC will make the lates blog post be on top
	$result = mysqli_query($con, "SELECT * FROM blogapp ORDER BY bid DESC $limstring");
?>
<?php while($row = mysqli_fetch_array($result)): ?>

<hr>
<?php 
	echo '<h2>' . $row['blogtitle'] . '</h2>';
?><br>

<div>
	
</div>

<?php 
	//nlb2r is for multiple lines entry
	echo '<div>' . nl2br(addEmoticons(makeClickableLinks($row['blogentry']))) . '</div>';
?><br>

<?php 
	$date = strtotime($row['blogtimedate']); //this fixes niggly mySQL to PHP date convertion
	echo '<p>' . date("F j, Y, g:i a", $date) . '</p>';
?><br>

<a href="profile.php?bid=<?= $row['bid']?>">Learn More</a>
<?php endwhile; ?>

<?php 

	///////////////// pagination links: perhaps put these BELOW where your results are echo'd out.
	if($postnum > $limit) {
		echo "<strong>Pages:</strong> &nbsp;&nbsp;&nbsp;";
		$n = $pg + 1;
		$p = $pg - 1;
		$thisroot = $_SERVER['PHP_SELF'];

		if($pg > 1){
			echo "<a href=\"$thisroot?pg=$p\"><< prev</a>&nbsp;&nbsp;";
		}

		for($i=1; $i<=$num_pages; $i++){
			if($i!= $pg){
				echo "<a href=\"$thisroot?pg=$i\">$i</a>&nbsp;&nbsp;";
			}	else{
				echo "$i&nbsp;&nbsp;";
			}
		}

		if($pg < $num_pages){
			echo "<a href=\"$thisroot?pg=$n\">next >></a>";
		}

		echo "&nbsp;&nbsp;";
	}
	////////////// end pagination

?>



<?php
//footer include
include('includes/footer.php');
?>