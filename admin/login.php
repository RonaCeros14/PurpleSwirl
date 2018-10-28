<?php
session_start();
include("connectionString.php");
if (isset($_POST['btnLogin'])) 
{
  $varcharUsername = mysqli_real_escape_string($connect, $_POST['txtbxUsername']);
  $varcharPassword = mysqli_real_escape_string($connect, $_POST['txtbxPassword']);
  $queryAccount = "SELECT * FROM tbl_adminaccount WHERE username ='$varcharUsername' AND password='$varcharPassword' ";
  $resultAccount = mysqli_query($connect, $queryAccount);

  if (mysqli_num_rows($resultAccount) == 1) 
  {
    $_SESSION['sessionUsername'] = $varcharUsername;
    $_SESSION['sessionPassword'] = $varcharPassword;
    header('location: index.php');
  }
  else 
  {
    $message = "No account matches the given information";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Login</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
</head>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" action="login.php" method="POST">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" name="txtbxUsername" placeholder="Username" autofocus required>
        </div>
        <div class="input-group">
          <span class="input-group-addon" ><i class="icon_key_alt"></i></span>
          <input type="password" name="txtbxPassword" class="form-control" placeholder="Password" required>
        </div>
        <input type="submit" name="btnLogin" class="btn btn-primary btn-lg btn-block" value="LOGIN"></input>
      </div>
    </form>
  </div>


</body>

</html>
