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
    
        .container{
            margin: 30px;
            margin-left: 50px;
        }
    
        .style{
            font-weight: bold;
            font-family: sans-serif;
        }
        .first{
            float: left;
            
        }
        .second{
            float: right;
            position: relative;
            right: 300px;
        }
        thead{
            font-family: sans-serif;
            color: white;
            
        }
    </style>
</head>

<body>

    <!-- Start your project here-->
    <?php include("navbarstudent.php");
    
    ?>
    <div class="container">
    
        <form method="get">
            Select Subject:
            <select name="subject" class="form-control">
            <?php
                $query="select class from students where enrollment_no='".$_COOKIE['id']."' ";
                $result=mysqli_query($link,$query);
                $row=mysqli_fetch_array($result);
                $class=$row[0];
                echo $class;
                $query="select subject_name from subjects where class='".$class." ' ";
                $result=mysqli_query($link,$query);
                while($row=mysqli_fetch_array($result)){
                    echo "<option>$row[0]</option>";
                }
            
            ?>
        
            </select>
            
            Select Month:
            <select class="form-control" name="month">
            
                <option>January</option>
                <option>February</option>
                <option>March</option>
                <option>April</option>
                <option>May</option>
                <option>June</option>
                <option>July</option>
                <option>August</option>
                <option>September</option>
                <option>October</option>
                <option>November</option>
                <option>December</option>
            </select>
            <button class="btn btn-secondary" type="submit" name="submit">Generate Attendance</button>
            <hr>
        </form>
        <?php
            if(isset($_GET["submit"])){
                echo "<div class='contain style'><div class='first'>";
                echo "<span class='style'>Enrollment No: " . $_COOKIE["id"] ."</span><br>";
                echo "<span class='style'>Subject: ". $_GET['subject'] . '</span><br>'; 
                echo "<span class='style'>Month: ". $_GET['month'] . '</span><br><br></div>'; 
                $subject=$_GET['subject'];
                $subject = str_replace(' ', '_', $subject);
                $subject=strtolower($subject);
            $query="select * from $subject where enrollment_no='".$_COOKIE['id']."' and month='".$_GET['month']."' and attendance='Present' ";
                if(!$result=mysqli_query($link,$query))
                    $classes_attended=0;
                else
                    $classes_attended=mysqli_num_rows($result);
                $query="select date,attendance from $subject where enrollment_no='".$_COOKIE['id']."' and month='".$_GET['month']."' ";
                if(!$result=mysqli_query($link,$query)){
                    echo "<div class='alert alert-danger'><strong>No Record found</strong></div>";
                    $total_classes=0;
                }
                else{
                    $total_classes=mysqli_num_rows($result);
                    echo "<div class='second'>";
                    echo "Total classes held= ". $total_classes. "<br>";
                    echo "Total classes attended= ". $classes_attended. "<br></div></div>";
                    echo "<table class='table table-bordered'>
                    <thead class='mdb-color darken-3' >
                        <tr>
                            <th scope='col'>#</th>
                            <th scope='col'>Date</th>
                            <th scope='col'>Attendance</th>
                        </tr>
                    </thead>
                    ";
                    $i=1;
                    while($row=mysqli_fetch_array($result)){
                        echo "<tr>
                                <td>$i</td>
                                <td>$row[0]</td>
                                <td>$row[1]</td>
                            </tr>";
                        $i++;
                    }
                }
            }
        
        ?>
        
    
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
