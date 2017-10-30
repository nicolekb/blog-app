<?php 

//connect to db
include("mysql_connect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blog Application</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
	

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


	 <!-- Your Custom styles for this project -->
	 <!--  Note how we can use BASE_URL constant to resolve all links no matter where the file resides. -->
	<link href="<?php echo BASE_URL; ?>css/styles.css" rel="stylesheet">

<script type="text/javascript">
  function emoticon(text) {
    var txtarea = document.myform.bentry;
    text = ' ' + text + ' ';
    if (txtarea.createTextRange && txtarea.caretPos) {
      var caretPos = txtarea.caretPos;
      caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == ' ' ? text + ' ' : text;
      txtarea.focus();
    } else {
      txtarea.value  += text;
      txtarea.focus();
    }
  }
</script>

<script type="text/javascript">
    $(function(){
      // bind change event to select
      $('#blog-list').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
</script>

<body>
  <div class="wide container-fluid">
        <div class="jumbotron ">
        <h1>Blog Application - Lab06</h1> 
        <p>by: Nicole</p> 
      </div> <!-- jumbotron -->
      

      <!-- Static navbar -->
      <nav class="navbar">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!--  We'll use the BASE_URL set in the connection script to resolve all links -->
            <a class="navbar-brand" href="<?php echo BASE_URL ?>index.php">Blog Application</a>
          </div> <!-- navbar-header -->

          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <!-- This page doesn't exist. It's just a sample link. YOU need to change it! -->
              <li><a href="<?php echo BASE_URL; ?>index.php">Blog List</a></li>
              <li><a href="<?php echo BASE_URL ?>admin/insert.php">Insert Blog</a></li>
              <li><a href="<?php echo BASE_URL ?>admin/edit.php">Edit Blog</a></li>
              <li><a href="<?php echo BASE_URL ?>search.php">Search</a></li>

              <!-- login/logout -->
              <?php session_start(); ?>
              <?php if( isset( $_SESSION["nklb20175blog"] ) ) : ?>
                <li><a href="<?php echo BASE_URL ?>admin/logout.php">Log Out</a></li>
              <?php else : ?>  
                <li><a href="<?php echo BASE_URL ?>admin/login.php">Log In</a></li>
              <?php endif; ?>  
            </ul>
          </div><!--/.nav-collapse -->

        </div><!--/.container-fluid -->
      </nav> <!-- nav --> 
  </div>


      <div class="container-fluid">


	
