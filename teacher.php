<?php
session_start();
include("connection.php");

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
    
    
     #logout{

            float: right;
             
        }
        table {
            font-size: 50px;
        }
        #log{
            font-weight: 30px;
        }
    
    </style>
</head>

<body>
    <!-- Start your project here-->
    <?php
        include("navbarteacher.php");
        $query="select name from users where no='".$_COOKIE['id']." ' " ;
        $row=mysqli_query($link,$query);
        $row=mysqli_fetch_array($row);
        $name=$row[0]; 
    
        $query="select photo from users where no='".$_COOKIE['id']." ' " ;
        $row=mysqli_query($link,$query);
        $row=mysqli_fetch_array($row);
        $image=$row[0];
    ?>
    
    <div class="jumbotron text-center blue-grey lighten-5 ">

<!--Title-->
<h1 class="card-title h2-responsive font-bold mt-3"><strong>Welcome to Attendance Managment Systen</strong></h1>
<!--Subtitle-->
<h4 class="pt-2 font-bold indigo-text"><strong><?php echo $_SESSION["name"] ;?></strong></h4>
<img src="uploads/<?php echo $image;  ?>" style="width: 300px; height:200px;" >
<!--Text-->
<div class="d-flex justify-content-center">
    <p class="card-text my-3" style="max-width: 43rem;">Here is the remedy for all your attendance queries. You can upload attendance online, view attendance of any particular student, update profile and contact admin of the system.
    </p>
</div>

<hr class="my-4 pb-2">
        <!--Card Narrower-->

    <!--/.Card content-->


<!--/.Card Regular-->


</div>
    <br>
    Folowing are the subjects you teach:
    <br><br>
    <div class="container">
    <table class="table table-bordered">
    
    <thead class="thead-dark">
        <tr>
        <th scope="col">#</th>
      <th scope="col">Subject</th>
      <th scope="col">Paper Id</th>
      <th scope="col">Class</th>
        </tr>
    </thead>
    <?php
        $query=" select subject_name, code,class from subjects where teacher='$name' ";
        $result=mysqli_query($link,$query);
        $i=1;
        while($row=mysqli_fetch_array($result)){
            echo "<tr>
            <th scope='row'>$i</td>
         <td>$row[0]</td>
         <td>$row[1]</td>
         <td>$row[2]</td>
    
            </tr>";
            $i++;
        }
    ?>
        
    </table>
        </div>
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
