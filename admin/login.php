<?php
//include header
include("../includes/header.php");

$action = $_POST['action'];

if (isset($_POST['submit'])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  if (($username != "") || ($password != "")) {
    session_start();

    $_SESSION['nklb20175blog'] = session_id();
    header("Location:" . BASE_URL);

  } elseif ((username == "") || (password == "")) {
    $msglogIn = "Please complete the form";
  } else {
    $msglogIn = "Incorrect Login";
  }
}


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Blog Application</title>
    <style type="text/css">
      body {
        background-color: #ccc;
        font-family: verdana, arial;
      }

      #container {
        background-color: #fff;
        /*padding: 20px;*/
        width: 600px;
        margin: auto;
      }

      #myform p {
        width: 350px;
        clear: left;
        margin: 0;
        padding: 15px 0px 5px 0px;
        padding-left: 155px; /*width of left "column" containing the labels*/
      }

      #myform label {
        float: left;
        margin-left: -155px;
        width: 150px;
      }

      #myform input[type="text"],
      #myform input[type="password"],
      select, textarea {
        width: 400px;
        padding: 5px;
        /*optional eye candy*/
        border: 1px solid #ccc;
        background-color: #eaeaea;
      }

      #myform {
        padding: 2em 1em;
      }

      .message {
        color: #f00;
        font-weight: bold;
        padding-left: 1em;
      }

      .header {
        background-color: #e5e5e5;
        padding: 2em;
        text-align: center;
        height: 200px;
      }

      .loginForm {
        position: relative;
        left: 40%;
      }

      .loginForm a {
        text-decoration: none;
        color: #000;
      }

      .loginForm a:hover {
        text-decoration: underline;
        color:#800000;
        font-weight: bold;
      }

      input {
        border: 1px solid #c3c3c3;
        height: 3em;
        width: 5em;
        color: #800000;
      }

    </style>
  </head>
  <body>

    <div id="container">
      <form name="myform" id="myform" method="post" action="login.php">

        <p>
          <label for="username">Name:</label>
          <input type="text" name="username" id="user">
        </p>

        <p>
          <label for="password">Password:</label>
          <input type="password" name="password" id="password">
        </p>

        <input type="submit" name="submit" class="btn btn-primary">

      </form>

      <div class="message">
        <?php
          if ($msglogIn) {
            echo $msglogIn;
          }
         ?>
      </div>

    </div>

  </body>
</html>