<?php
session_start();
include("connection.php");
$error="";
$query="select name,email from users where no='".$_COOKIE['id']."' ";
$result=mysqli_query($link,$query);
$row=mysqli_fetch_array($result);
if(array_key_exists("submit",$_GET)){
    
    if($_GET["subject"]=="")
        $error.="<p>Subject field is empty</p>";
    if($_GET["message"]=="")
        $error.="<p>Message field is empty</p>";
    if($error==""){
        $query="insert into contact_admin values('".date('Y/m/d')."','$row[0]','$row[1]','".$_GET['subject']."','".$_GET['message']."') ";
        if(!mysqli_query($link,$query))
            $error.="Error in sending message";
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
            width: 40%;
            margin: 60px;
        }
        #bold{
            font-weight: bold;
        }
        #contact{
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- Start your project here-->
    <?php 
    $query="select role from users where no='".$_COOKIE['id']."' ";
    $result=mysqli_query($link,$query);
    $result=mysqli_fetch_array($result);
    if($result[0]=="Student")
        include("navbarstudent.php");
    else
        include("navbarteacher.php");
    if(array_key_exists("submit",$_GET)){
    if($error!="")
        echo "<div class='alert alert-danger'><strong>". $error . "</strong></div>";
    else
        echo "<div class='alert alert-success'><strong>Message sent successfully</strong></div>";
    }
    ?>
    <div class="container">
        <!-- Form contact -->
<form method="get">

    <p class="h5 text-center mb-4" id="contact" >Contact Admin</p>
    <span id="bold">
    Your Name: <?php echo " ". $row[0] ?>
    <br>
    Your Email: <?php echo " ". $row[1] ?>
        </span>
    <br><br>
    <div class="md-form">
        <i class="fa fa-tag prefix grey-text"></i>
        <input type="text" id="form32" class="form-control" name="subject">
        <label for="form34">Subject</label>
    </div>

    <div class="md-form">
        <i class="fa fa-pencil prefix grey-text"></i>
        <textarea type="text" id="form8" class="md-textarea" style="height: 100px" name="message"></textarea>
        <label for="form8">Your message</label>
    </div>

    <div class="text-center">
        <button class="btn btn-unique" type="submit" name="submit">Send <i class="fa fa-paper-plane-o ml-1"></i></button>
    </div>

</form>
<!-- Form contact -->
    </div>
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
