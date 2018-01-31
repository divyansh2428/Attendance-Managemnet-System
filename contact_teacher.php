<?php
session_start();
include("connection.php");
$error="";
if(isset($_GET["submit"])){
    if($_GET["message"]=="")
        $error.="Message field is empty";
    if($error==""){
        $teacher=$_GET["teacher"];
        $teacher=str_replace(' ', '_', $teacher);
        $teacher=strtolower($teacher);
        $query="insert into $teacher values('".date('Y/m/d')."','".$_COOKIE['id']."','".$_SESSION['name']."','".$_GET['message']."')";
        if(!$result=mysqli_query($link,$query))
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
            margin: 30px;
        }
    
    </style>
</head>

<body>
    
    
    <?php include("navbarstudent.php");
    if(isset($_GET["submit"])){
    if($error=="")
        echo "<div class='alert alert-success'><strong>Message sent successfully</strong></div>";
    else
        echo "<div class='alert alert-danger'><strong>". $error."</strong></div>";
    }
    ?>
    <div class="container">
        Select teacher
        <form method="get">
            <select class='form-control' name="teacher">
            <?php
                $query="select class from students where enrollment_no='".$_COOKIE['id']."' ";
                $result=mysqli_query($link,$query);
                $row=mysqli_fetch_array($result);
                $class=$row[0];
                echo $class;
                $query="select teacher from subjects where class='".$class."' ";
                $result=mysqli_query($link,$query);
                while($row=mysqli_fetch_array($result)){
                    echo "<option>$row[0]</option>";
                }
                ?>
            </select>
            <br>
            <div class="md-form">
                <i class="fa fa-pencil prefix grey-text"></i>
                <textarea type="text" id="form8" class="message md-textarea" style="height: 100px" name="message"></textarea>
                <label for="form8">Your message</label>
            </div>
                <button class="btn btn-secondary" type="submit" name="submit">Submit</button>
            </form>
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
