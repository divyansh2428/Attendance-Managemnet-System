<?php
session_start();
include("connection.php");
$error="";
if(array_key_exists("submit",$_GET)){
    
    if($_GET["email"]!=""){
        $query="update users set email='".$_GET['email']."' where no='".$_COOKIE['id']."' ";
        if(!mysqli_query($link,$query))
            $error.="<p>Error in updating email</p>";
    }
    if($_GET["username"]!=""){
        $query="update users set username='".$_GET['username']."' where no='".$_COOKIE['id']."' ";
        if(!mysqli_query($link,$query))
            $error.="<p>Error in updating username</p>";
    }
    if($_GET["role"]!=""){
        $query="update users set role='".$_GET['role']."' where no='".$_COOKIE['id']."' ";
        if(!mysqli_query($link,$query))
            $error.="<p>Error in updating role of faculty</p>";
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
        html { 
  background: url(images/annie-spratt-419273.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
        body{
            background: none;
        }
        #logout{
            float: right;
        }
        .container{
            background-color: lightcyan;
            margin: 40px;
            width: 40%;
            position: relative;
            left: 300px;
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
        echo "<div class='alert alert-success'><strong>Profile updated successfully</strong></div> ";
    }
    $id=$_COOKIE['id'];
    $query="select * from users where no='".$_COOKIE['id']."' ";
    if(!$result=mysqli_query($link,$query))
        echo "Error in identifying user";
    else
        $row=mysqli_fetch_array($result);
    
    ?>
    <!-- /Start your project here-->
    <div class="container">
        <br>
    <form method="get">
    <p class="h5 text-center mb-4">Update Your Profile </p>
        <br>
    <div class="md-form">
        
        <input type="email" id="email" class="form-control" name="email" placeholder="<?php echo $row[2] ;?>">
        <label for="email">Your email</label>
    </div>
        
    <div class="md-form">
        
        <input type="text" id="username" class="form-control" name="username" placeholder="<?php echo $row[3] ;?>">
        <label for="username">Your username</label>
    </div>
        Role: 
    <select class="mdb-select form-control" name="role">
    <option><?php echo $row[5]; ?></option>
    <option><?php
        if($row[5]=="Student")
            echo "Faculty";
        else
            echo "Student";
        ?></option>
</select>
    

    <div class="text-center">
        <button class="btn btn-deep-orange" type="submit" name="submit">Save Changes</button>
    </div>

</form>
        <br>
        </div>
    
<!-- Form register -->
                
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
