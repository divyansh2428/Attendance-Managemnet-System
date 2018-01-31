<?php
session_start();
include("connection.php");

$no=$_COOKIE['id'];
$error="";

if(isset($_GET["submit"])){
    
    $query="select password from users where no='$no'";
    if(!$row=mysqli_query($link,$query))
        echo 'ERROR in reading your current password';
    else{
        $row=mysqli_fetch_array($row);
        if($row[0]!=$_GET["current"] && $_GET["current"]!="")
            $error.="<p>This is not your current password</p>";
    if($_GET["current"]=="")
        $error.="<p>Current Password is missing</p>";
     if($_GET["new"]=="")
        $error.="<p>New Password is missing</p>";
     if($_GET["confirm"]=="")
        $error.="<p>Please confirm password</p>";
    if($_GET['new']!=$_GET['confirm'] && $_GET["new"]!="" && $_GET["confirm"]!="")
        $error.="<p>Password's don't match</p>";
    if($error!="")
        echo '<div class="alert alert-danger"><strong>'. $error. '</strong></div>';
    else{
        
        $query="update users set password='".$_GET['new']."' where no='$no' ";
        if(!mysqli_query($link,$query))
                    echo "ERROR in executing query!!!";
        else
            echo '<div class="alert alert-success"><strong>'. 'Password Changed Successfully'. '</strong></div>';
    }
        
    
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
    
        .container{
            margin: 100px;
            width: 500px;
            margin-left: 400px;
        }
        #logout{
            float: right;
        }
      
    
    
    </style>
</head>

    
<body>
    <?php
    
    include("navbarteacher.php");
    
    ?>
    <div class="container">
    <form>
    <p class="h5 text-center mb-4">Change Password</p>
<br>
    <div class="md-form">
        <i class="fa fa-lock prefix grey-text"></i>
        <input type="password" id="defaultForm-pass" class="form-control" name="current">
        <label for="defaultForm-pass">Current password</label>
    </div>

    <div class="md-form">
        <i class="fa fa-lock prefix grey-text"></i>
        <input type="password" id="defaultForm-pass" class="form-control" name="new">
        <label for="defaultForm-pass">New password</label>
    </div>
        
        <div class="md-form">
        <i class="fa fa-lock prefix grey-text"></i>
        <input type="password" id="defaultForm-pass" class="form-control" name="confirm">
        <label for="defaultForm-pass">Confirm password</label>
    </div>

    <div class="text-center">
        <button class="btn btn-default" name="submit">Submit</button>
    </div>
</form>
        </div>
<!-- Form login -->
                
    <!-- Start your project here-->
   
    <!-- /Start your project here-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>
