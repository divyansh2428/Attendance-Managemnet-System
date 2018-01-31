<?php
include("connection.php");
$error="";
$email="";
$count=0;
function validEmail($email){
    // First, we check that there's one @ symbol, and that the lengths are right
    if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
        // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
        return false;
    }
    // Split it into sections to make life easier
    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++) {
        if (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
            return false;
        }
    }
    if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
        $domain_array = explode(".", $email_array[1]);
        if (sizeof($domain_array) < 2) {
            return false; // Not enough parts to domain
        }
        for ($i = 0; $i < sizeof($domain_array); $i++) {
            if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
                return false;
            }
        }
    }

    return true;
}
    if(array_key_exists("no",$_GET))
    {
        if($_GET["name"]=="")
            $error.="<p>Name is missing</p>";
        if($_GET["no"]=="")
            $error.="<p>Enrollment/Id No: missing</p>";
         if(strlen($_GET["no"])!=11 && $_GET["no"]!="" )
             $error.="<p>Enrollment no: must be of length 11</p>";
        
        if($_GET["email"]=="")
            $error.="<p>Email id missing</p>";
        
        if(validEmail($_GET["email"])==false && $_GET["email"]!="")
            $error.="<p>Email Address is invalid</p>";
        if($_GET["username"]=="")
            $error.="<p>Username missing</p>";
        if($_GET["password"]=="")
            $error.="<p>Password missing</p>";
        
    $query="select * from users where no='".$_GET['no']." ' ";
        $row=mysqli_query($link,$query);
    if(mysqli_num_rows($row)>=1)
        $error.="<p>Enrollment no already exists </p>";
        
        $query="select * from users where username='".$_GET['username']." ' ";
        $row=mysqli_query($link,$query);
    if(mysqli_num_rows($row)>=1)
        $error.="<p>Username already exists </p>";
        
        $query="select * from users where email='".$_GET['email']." ' ";
        $row=mysqli_query($link,$query);
    if(mysqli_num_rows($row)>=1)
        $error.="<p>Email already exists </p>";
        
 
    //Process the image that is uploaded by the user

    /*$target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (!move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
        $error.= "<p>Sorry, there was an error uploading your file.</p>";
    }
        else
            $image=basename( $_FILES["imageUpload"]["name"],".jpg"); // used to store the filename in a variable*/

    //storind the data in your database

        if($error!="")
            echo '<div class="alert alert-danger"><strong>'.$error.'</strong></div>';
        else
        {
            
            $query="insert into users values('".$_GET['no']."','".$_GET['name']."','".$_GET['email']."','".$_GET['username']."','".$_GET['password']."','".$_GET['role']."','".$_GET['college']."') ";
            if(!mysqli_query($link,$query))
                echo "Some error has occurred";
            else
                echo '<div class="alert alert-success"><strong>Registration Successfull</strong>'. '<a href="front.php"><h4 id="last">Go back to home page</h4></a>'.'</div>';
        }
    }
?>
<!-- Form register -->
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
            width:auto;
            margin: 40px;
            
        }
        #head{
            margin: 10px;
            font-family:fantasy;
        }
        a:hover{
            text-decoration: underline;
        }
        #home{
            text-align: center;
        }
        #last{
            margin-top: 0px;
            text-align: right;
        }
    </style>
</head>

<body>

    <!-- Start your project here-->
   
    <!-- /Start your project here-->
<!-- Form register -->
<form method="get">
    <div id="head"><h1>Register yourself</h1></div>
    <div class="container">
        
        <div class="md-form">
            <i class="fa fa-user prefix grey-text"></i>
            <input type="text" id="name" class="form-control" name="name"> 
            <label for="no">Name</label>
        </div>
        
        <div class="md-form">
            <i class="fa fa-user prefix grey-text"></i>
            <input type="text" id="no" class="form-control" name="no"> 
            <label for="no">Enrollment No: / Id No:</label>
        </div>
        
    <div class="md-form">
        <i class="fa fa-envelope prefix grey-text"></i>
        <input type="email" id="orangeForm-email" class="form-control" name="email">
        <label for="orangeForm-email">Your email</label>
    </div>
        <div class="md-form">
        <i class="fa fa-envelope prefix grey-text"></i>
        <input type="text" id="username" class="form-control" name="username">
        <label for="username">Username</label>
    </div>

    <div class="md-form">
        <i class="fa fa-lock prefix grey-text"></i>
        <input type="password" id="orangeForm-pass" class="form-control" name="password">
        <label for="orangeForm-pass">Your password</label>
    </div>

        <div class="form-group">
    <label for="college"><strong>College</strong></label>
    <select class="form-control" id="college" name="college">
      <option>UNIVERSITY SCHOOL OF INFORMATION, COMMUNICATION & TECHNOLOGY</option>
      <option>UNIVERSITY SCHOOL OF CHEMICAL TECHNOLOGY</option>
      <option>UNIVERSITY SCHOOL OF BIO-TECHNOLOGY</option>
      <option>UNIVERSITY SCHOOL OF MANAGEMENT STUDIES</option>
      <option>UNIVERSITY SCHOOL OF LAW AND LEGAL STUDIES</option>
    </select>
  </div>
        <div class="form-group">
            <label for="role"><strong>Role</strong></label>
            <select class="form-control" id="role" name="role">
                <option>Student</option>
                <option>Faculty</option>
            </select>
    </div>
        

 <!--<form  method="post" enctype="multipart/form-data">
    <strong>Select image to upload:</strong>
    <br><br>
    <input type="file" name="imageUpload" id="imageUpload">
</form>-->
    <div class="text-center">
        <button type="submit" class="btn btn-deep-orange">Sign up</button>
    </div>
        <div class="text-center">
        <a href="front.php"><button type="button" class="btn btn-secondary">Home</button></a>
            </div>

    </div>
    </form>
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

<!-- Form register -->
                

