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

//form validation
if (isset($_POST['submit'])) {
	$btitle = strip_tags(trim($_POST['btitle']));
	$bentry = strip_tags(trim($_POST['bentry']));

	$boolValidate = 1;

	if ((strlen($btitle) < 2) || ($btitle == "")) {
		$boolValidate = 0;
		$validationMsgTitle = "Please enter a title. *Required Field</br>";
	} 

	if ((strlen($bentry) < 2) || ($bentry == "")) {
		$boolValidate = 0;
		$validationMsgEntry = "Please compose an entry. *Required Field</br>";
	}

	if ($boolValidate !== 0) {
		mysqli_query( $con, "INSERT INTO blogapp (blogtitle, blogentry) VALUES ('$btitle', '$bentry')" ) or die (mysqli_error($con));
	}

}
?>
	<div class="col-md-6">
		<h2>New Blog Entry</h2>

		<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
			 <div class="form-group">
			    <label for="btitle">Title:</label>
			    <input type="text" class="form-control" id="btitle" name="btitle">
			    <div class="error"><?php echo $validationMsgTitle; ?></div>
			  </div>

			  <div class="form-group">
			    <label for="bentry">Entry:</label>
			    <textarea class="form-control" id="bentry" name="bentry"></textarea>
			    <div class="error"><?php echo $validationMsgEntry; ?></div>
			  </div>

			  <!-- emoticons -->
			  <div class="pull-right">
			  		<a href="javascript:emoticon(':)')"><img src="../emoticons/icon_smile.gif" alt="" width="15" height="15" border="0"></a>
			  		<a href="javascript:emoticon('?)')"><img src="../emoticons/icon_confused.gif" alt="" width="15" height="15" border="0"></a>
			  		<a href="javascript:emoticon('->')"><img src="../emoticons/icon_arrow.gif" alt="" width="15" height="15" border="0"></a>
			  		<a href="javascript:emoticon(':(')"><img src="../emoticons/icon_sad.gif" alt="" width="15" height="15" border="0"></a>
			  		<a href="javascript:emoticon(';)')"><img src="../emoticons/icon_wink.gif" alt="" width="15" height="15" border="0"></a>
			  		<a href="javascript:emoticon('>:|')"><img src="../emoticons/icon_mad.gif" alt="" width="15" height="15" border="0"></a>
			  		<a href="javascript:emoticon('XD')"><img src="../emoticons/icon_lol.gif" alt="" width="15" height="15" border="0"></a>
			  		<a href="javascript:emoticon('BD')"><img src="../emoticons/icon_cool.gif" alt="" width="15" height="15" border="0"></a>
			  		<a href="javascript:emoticon(':O')"><img src="../emoticons/icon_surprised.gif" alt="" width="15" height="15" border="0"></a>
			  </div>

		   	 <div class="form-group">
		   	 	<label for="submit">&nbsp;</label>
			    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
		  	</div>
		</form>
	</div>

<?php 
//footer include
include('../includes/footer.php');
?>