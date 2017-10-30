<?php 
//login page
session_start();

if (!isset($_SESSION["nklb20175blog"])) {
	header("Location:login.php");
}
?>
<?php 
//header include
include('../includes/header.php');

// blog id
$blog_id = $_GET['bid'];

//if blog does not exist
if (!isset($blog_id)) {
	$result2 = mysqli_query($con, "SELECT * FROM blogapp LIMIT 1") or die(mysqli_error($con));

	while ( $row = mysqli_fetch_array($result2) ) {
		$btitle = strip_tags(trim($_POST['btitle']));
		$bentrie = strip_tags(trim($_POST['bentry']));
	}
} //if not exist

//form validation
if (isset($_POST['submit'])) {
	$bid = strip_tags(trim($_POST['bid']));
	$btitles = strip_tags(trim($_POST['btitle']));
	$bentries = strip_tags(trim($_POST['bentry']));

	$boolValidate = 1;

	//title
	if ((strlen($btitles) < 2) || ($btitles == "")) {
		$boolValidate = 0;
		$validationMsgTitle = "Please enter a title. *Required Field</br>";
	} 

	//entry
	if ((strlen($bentries) < 2) || ($bentries == "")) {
		$boolValidate = 0;
		$validationMsgEntry = "Please compose an entry. *Required Field</br>";
	}

	//successful
	if ($boolValidate !== 0) {
		mysqli_query( $con, "UPDATE blogapp SET
			blogtitle = '$btitles',
			blogentry = '$bentries'
			WHERE bid = $bid" ) 
		or die (mysqli_error($con));
	}

}; //validation

//list all the inserted blogs | form select navigation
$result = mysqli_query($con, "SELECT * FROM blogapp") or die(mysql_error($con));

echo '<h4>Select a blog to edit</h4>';
echo '<select name="Blog List" id="blog-list">';
echo '<option value="" disabled selected>Select a blog to edit</option>';

while ($row = mysqli_fetch_array($result)) {
$btitleLink = $row['blogtitle'];
$bid = $row['bid'];

	if ($blog_id == $bid ) {
		echo "<option value=\"edit.php?bid=$bid\" selected>" . $btitleLink . "</option>";
	} else {
		echo "<option value=\"edit.php?bid=$bid\">" . $row['blogtitle'] . "</option>";
	}

}

echo '</select>';

// //retrieve
$result2 = mysqli_query($con, "SELECT * FROM blogapp WHERE bid = '$blog_id'") or die(mysqli_error($con));

while ($row = mysqli_fetch_array($result2)) {
	$blog_id = $row['bid'];
	$btitle = $row['blogtitle'];
	$bentry = $row['blogentry'];
}; //while

?>

<?php if( $blog_id ) : ?>
	<!-- blog navigation -->
	<div class="col-md-6">
		<hr>

		<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
			<input type="hidden" value="<?php echo $blog_id  ?>" name="bid">

			 <div class="form-group">
			    <label for="btitle">Title:</label>
			    <input type="text" class="form-control" id="btitle" name="btitle" value="<?php echo $btitle;?>">
			    <div class="error"><?php echo $validationMsgTitle; ?></div>
			  </div>

			  <div class="form-group">
			    <label for="bentry">Entry:</label>
			    <textarea class="form-control" id="bentry" name="bentry"><?php echo $bentry;?></textarea>
			    <div class="error"><?php echo $validationMsgEntry; ?></div>
			  </div>

			  <!-- emoticons -->
			  <div class="pull-right">
			  		<a href="javascript:emoticon(':)')"><img src="../emoticons/icon_smile.gif" alt="" width="15" height="15" border="0"></a>
			  		<a href="javascript:emoticon('?)')"><img src="../emoticons/icon_confused.gif" alt="" width="15" height="15" border="0"></a>
			  		<a href="javascript:emoticon('->')"><img src="../emoticons/icon_arrow.gif" alt="" width="15" height="15" border="0"></a>
			  		<a href="javascript:emoticon(':(')"><img src="../emoticons/icon_sad.gif" alt="" width="15" height="15" border="0"></a>
			  		<a href="javascript:emoticon(';)')"><img src="../emoticons/icon_wink.gif" alt="" width="15" height="15" border="0"></a>
			  		<a href="javascript:emoticon('>:(')"><img src="../emoticons/icon_mad.gif" alt="" width="15" height="15" border="0"></a>
			  		<a href="javascript:emoticon('XD')"><img src="../emoticons/icon_lol.gif" alt="" width="15" height="15" border="0"></a>
			  		<a href="javascript:emoticon('BD')"><img src="../emoticons/icon_cool.gif" alt="" width="15" height="15" border="0"></a>
			  		<a href="javascript:emoticon(':O')"><img src="../emoticons/icon_surprised.gif" alt="" width="15" height="15" border="0"></a>
			  </div>

		   	 <div class="form-group">
		   	 	<label for="submit">&nbsp;</label>
			    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
			    <a href="delete.php?bid=<?php echo $blog_id; ?>" class="btn btn-danger">Delete</a>
		  	</div>

		</form>
	</div>
<?php else : ?>
	<hr>
	<p style="color: #ccc; font-size: 14px;">Select a blog to edit above</p>
<?php endif; ?>

<?php 
//footer include
include('../includes/footer.php');
?>