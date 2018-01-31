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
    
        #date{
            width: 250px;
        }
    
    
    </style>
    
</head>

<body>

    <!-- Start your project here-->
    <?php
        include("navbarteacher.php");
    ?>
    <br>
    <h3> Please fill the required details</h3>
    
    <br><br>
    <div class="container">
    <form action="class.php" method="get">
        
        <div class="form-group">
            <label for="date">Date   </label>
            <input type="date" id="date" name="date">
        </div>
        <div class="form-group">
            <label for="subject">Choose Subject</label>
            <select id="subject" class="form-control" name="subject">
            <?php
            
            $query="select subject_name from subjects where teacher='".$_SESSION['name']." ' ";
            $result=mysqli_query($link,$query);
            while($row=mysqli_fetch_array($result)){
                echo "<option>$row[0]</option>;";
            }
            
            ?>
        </select>
        </div>
        <br>
        <button class="btn btn-success" type="submit">Generate Class</button>
        <!--<input type="submit" value="Generate Class">-->
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
