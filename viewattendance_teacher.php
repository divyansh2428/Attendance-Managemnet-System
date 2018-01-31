<?php
session_start();
include("connection.php");
$query="select name from users where no='".$_COOKIE['id']."' ";
$row=mysqli_query($link,$query);
$row=mysqli_fetch_array($row);
$name=$row[0];


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
            margin-left: 100px;
        }
        thead{
            color: red;
        }
        #no{
            width: 50%;
        }
        #text{
            font-weight: bold;
        }
    </style>
</head>

<body>

    <!-- Start your project here-->
    <?php
    $error="";
    include("navbarteacher.php");
    ?>
    <?php echo  $error ?>
    <div class="container">
    <form method="get">
        
            <div class="form-group">
            Select Subject: 
            <select  name="subject">
                <?php
                    $query="select subject_name from subjects where teacher='$name' ";
                    $result=mysqli_query($link,$query);
                    while($row=mysqli_fetch_array($result)){
                        echo "<option>$row[0]</option>";    
                    }

                ?>

            </select>
                </div>
            <div class="form-group">
                <label for="no">Enrollment no</label>
                <input type="text" name="enroll_no" id="no">
            </div>
            <button class="btn btn-info" type="submit" name="submit">Submit</button>
        
    </form>
    
    <?php
        
    if(array_key_exists("submit",$_GET)){
        echo "<br>";
        if($_GET["enroll_no"]==""){
            $error="Enrollment no: field is empty";
        echo "<div class='alert alert-danger'><strong>".$error. "</strong></div>";
    }
        else{
        
        $subject=$_GET['subject'];
        $subject=str_replace(' ', '_', $subject);
        $subject=strtolower($subject);
        $query="select date,attendance from $subject where enrollment_no='".$_GET['enroll_no']."' ";
            echo "<span id='text'>Enrollment No: ". $_GET["enroll_no"]."</span>";
        $result=mysqli_query($link,$query);
        if(mysqli_num_rows($result)==0){
            echo "<div class='alert alert-danger'><strong>No such record found</strong></div>";}
        else{
        $i=1;
            
       echo " <table class='table table-striped'>
        <thead class='mdb-color darken-3'>
            <tr>
            <th scope='col'>#</th>
            <th scope='col'>Date</th>
            <th scope='col'>Attendance</th>
            </tr>
        </thead>";
            while($row=mysqli_fetch_array($result)){
                echo "<tr>
                    <th scope='row'>$i</th>
                    <td>$row[0]</td>
                    <td>$row[1]</td>
                </tr>
                ";
                $i++;
            }
        }
        }
    }
    ?>
        </table>
    </div>
    }
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
