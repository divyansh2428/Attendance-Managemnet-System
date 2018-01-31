<?php
session_start();
include("connection.php");
$subject=$_GET['subject'];
$query="select class from subjects where subject_name='".$subject."' ";
$result=mysqli_query($link,$query);
$row=mysqli_fetch_array($result);
$class=$row[0];
$subject = str_replace(' ', '_', $subject);
$subject=strtolower($subject);
$date=$_GET['date'];
$time=strtotime($date);
$month=date("F",$time);
$year=date("Y",$time);
$query="select enrollment_no from students where class='".$class." ' ";
$result=mysqli_query($link,$query);
$i=1;
$error="";
    
 if(isset($_POST["submit"])){
    while($row=mysqli_fetch_array($result)){
        $query="insert into $subject values('".$date."','$month','$row[0]','".$_POST['attendance'. $i]."')";
        if(!mysqli_query($link,$query))
          $error="Error in uploading attendance";  
        $i++;
        
    }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
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
    
    
        #entry{
            font-size: 15px;
            font-weight: bold;
        }
        table {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php 
        include("navbarteacher.php"); 
        if(isset($_POST["submit"])){
            if($error)
                echo "<div class='alert alert-danger'><strong>" .$error. "</strong></div>";
            else
                echo "<div class='alert alert-success'><strong>Attendance Uploaded Successfully</strong></div>"; 
        }
    ?>
    
    <!-- Start your project here-->
    <span id="entry">Class:</span> <?php echo "  ". $class; ?>
    <br>
    <span id="entry">Date: </span><?php echo "  ". $_GET["date"]; ?>
    <br>
    <span id="entry">Subject:</span> <?php echo "  ". $_GET["subject"]; ?>
    <!-- /Start your project here-->
    <?php
    if($_GET["date"]=="")
        echo "<div class='alert alert-danger'><strong>No date found</strong></div>";
    else {
    
        $query="select enrollment_no,name from students where class='".$class."'";   
    if(!$result=mysqli_query($link,$query))
         echo "<div class='alert alert-danger'><strong>No Class record found</strong></div>"; 
    else {
            $i=1;
        echo "<form method='post'>
    <table class='table table-bordered'>
    <thead>
    <tr>
    <th scope='col'>#</th> 
    <th scope='col'>Enrollment No:</th>
    <th scope='col'>Name</th>
    <th scope='col'>Mark Attendance(P/A)</th>
    </tr>    
    </thead>
    
    <tbody>";
    while($row=mysqli_fetch_array($result)){
        
        echo "
        <tr>
        <td>$i</td>
        <td>$row[0]</td>
        <td>$row[1]</td>
        <td>
        <div class='form-group'>
        <select class='form-control' name='attendance$i'>
        <option>Present</option>
        <option>Absent</option>
        </select>
        </div>
        </td>
        </tr>
        ";
        $i++;
    }
        

    echo "</tbody>
    
    </table>
    <button class='btn btn-success' type='submit' name='submit'>Submit</button>
        </form>";
     }
    }
    ?>
        
    
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
