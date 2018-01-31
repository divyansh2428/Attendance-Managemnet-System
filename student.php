<?php
session_start();
include("connection.php");
//echo "<br>Welcome " . $_SESSION['id'];

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
      
        #logout{
            float: right;
        }
        .style{
            margin: 0px;
            text-align: center;
            font-family: sans-serif;
            font-size: 25px;
            background-color: wheat;
        }
      </style>  
</head>

<body>

    <!-- Start your project here-->
    <!-- /Start your project here-->

    <!-- SCRIPTS -->
    <!--Navbar-->
<!--Navbar-->
<?php
    include("navbarstudent.php");
    
 ?>
<!--/.Navbar-->
    <?php
        $query="select username from users where no='".$_COOKIE['id']."' ";
        $result=mysqli_query($link,$query);
        $row=mysqli_fetch_array($result);
        
        $query="select photo from users where no='".$_COOKIE['id']."' ";
        $result=mysqli_query($link,$query);
        $row=mysqli_fetch_array($result);
        $image=$row[0];
        
    ?>
        <!--Jumbotron-->
<div class="jumbotron text-center blue-grey lighten-5 ">

<!--Title-->
<h1 class="card-title h2-responsive font-bold mt-3"><strong>Welcome to Attendance Managment Systen</strong></h1>
<!--Subtitle-->
<h4 class="pt-2 font-bold indigo-text"><strong><?php echo $_SESSION["name"] ;?></strong></h4>
<img src="uploads/<?php echo $image;  ?>" style="width: 300px; height:200px;" >
<!--Text-->
<div class="d-flex justify-content-center">
    <p class="card-text my-3" style="max-width: 43rem;">Here is the remedy for all your attendance queries. You can view your attendance in different subjects, get a overall analysis of your attendance, contact teacher and admin facilities.. 
    </p>
</div>
</div>
<?php 
    
    $query="select class from students where enrollment_no='".$_COOKIE['id']."' ";
    $result=mysqli_query($link,$query);
    $row=mysqli_fetch_array($result);
    $class=$row[0];
    $query="select subject_name from subjects where class='".$class."' ";
    $result=mysqli_query($link,$query);
    $total_classes=0;
    $present=0;
    while($row=mysqli_fetch_array($result)){
        $subject=$row[0];
        $subject=str_replace(' ','_',$subject);
        $subject=strtolower($subject);
    
        $query="select * from $subject";
        if($result1=mysqli_query($link,$query))
            $total_classes+=mysqli_num_rows($result1);
        $query="select * from $subject where attendance='Present' ";
        if($result1=mysqli_query($link,$query))
            $present+=mysqli_num_rows($result1);
         $per=($present/$total_classes)*100;
        
    }
    ?>
    <div class='style'>
        Total classes held=<?php echo $total_classes; ?>
        <br>
        Total classes attended= <?php echo $present; ?>
        <br>
        Attendance Percentage= <?php echo $per; ?>%
    </div>";

    
      
<!--Jumbotron-->
                    
    
<!--/.Navbar-->
                
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>


