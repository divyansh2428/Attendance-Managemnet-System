<?php
session_start();
include("connection.php");
$error="";
if(array_key_exists("logout",$_GET))
{
    unset($_SESSION["id"]);
    setcookie("id","",time()-24*60*60);
}
/*else if(isset($_SESSION["id"])) {

    $query="select role from users where no='".$_COOKIE['id']." ' ";  
    if(!$result=mysqli_query($link,$query))
        echo "ERROR";
    else
    {
        $row=mysqli_fetch_array($result);
        if($row[0]=="Student")
            header("location: student.php");
        else if($row[0]=="Faculty")
            header("location: teacher.php");
            
    }
}*/

else{
         
          if(isset($_GET["submit"])){
              
    if($_GET["username"]=="")
        $error.="<p>Username field is empty</p>";
    if($_GET["password"]=="")
        $error.="<p>Password field is empty</p>";
    
    if($error=="")
    {
        $query="select no,role,name from users where username='".$_GET['username']." ' and password='".$_GET['password']."' and role='".$_GET['role']."' ";
        $result=mysqli_query($link,$query);
        if(mysqli_num_rows($result)>=1){  
            $row=mysqli_fetch_array($result);
            $_SESSION["id"]=$row[0];
            $_SESSION["name"]=$row[2];
            setcookie("id",$row[0],time()+365*24*60*60);
            if($row[1]=="Student")
                header("location: student.php");
            else if($row[1]=="Faculty")
                header("location: teacher.php");
        }
        else
          $error.="<div class='alert alert-danger'><strong>NO RECORD FOUND</strong></div>";
    }
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
  background: url(images/nainoa-shizuru-80385.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
        body{
            background: none;
        }
    .form-simple .font-small {
  font-size: 0.8rem; }

.form-simple .header {
  border-top-left-radius: .3rem;
  border-top-right-radius: .3rem; }

.form-simple input[type=text]:focus:not([readonly]) {
  border-bottom: 1px solid #ff3547;
  -webkit-box-shadow: 0 1px 0 0 #ff3547;
  box-shadow: 0 1px 0 0 #ff3547; }

.form-simple input[type=text]:focus:not([readonly]) + label {
  color: #4f4f4f; }

.form-simple input[type=password]:focus:not([readonly]) {
  border-bottom: 1px solid #ff3547;
  -webkit-box-shadow: 0 1px 0 0 #ff3547;
  box-shadow: 0 1px 0 0 #ff3547; }

.form-simple input[type=password]:focus:not([readonly]) + label {
  color: #4f4f4f; }
                
    .container{
            
            margin: 20px;
            margin-left: 450px;
            width: 500px;
            height: 50px;
        }
        .heading {
            width: "<script>screen.width</script>px";
            background-color: blue;
            text-align: center;
        }
        .title{
            font-weight: bold;
            font-size: 30px;
            color:sandybrown;
            
            
        }
        .login{
            text-align: center;
            background: 
        }
        #err{
            display: none;
        }
        
    </style>
        
</head>

<body>

    <!-- Start your project here-->
    
    <!-- /Start your project here-->
    
    <div class="heading"> 
        
    <span class="title ">GURU GOBIND SINGH INDRAPRASTHA UNIVERSITY</span>
        <hr>
    <span class="title">ATTENDANCE MANAGMENT SYSTEM</span>
    </div>
    <div class="container">
        <form method="get">
    <section class="form-simple">

    <!--Form with header-->
    <div class="card">

        <!--Header-->
        <div class="header pt-3 blue login">

            <div class="row d-flex justify-content-start">
                <h3 class="deep-red-text mt-3 mb-4 pb-1 mx-5"><strong>LOG IN</strong></h3>
            </div>
            
        </div>
        <!--Header
        <div class="alert alert-danger" id="err"></div>-->
        <?php
        if($error!="")
        echo '<div class="alert alert-danger"><strong>'.$error.'</strong></div>';
        ?>
        <div class="card-body mx-4 mt-4">

            <!--Body-->
            <div class="md-form">
                <input type="text" id="username" name="username" class="form-control" >
                <label for="username">Username</label>
            </div>

            <div class="md-form">
                <input type="password" id="password" name="password" class="form-control">
                <label for="password">Your password</label>
            </div>
            <label for="role">Role</label>
                <select id="role" name="role" class="form-control">
                    <option>Student</option>
                    <option>Faculty</option>
                </select>
            <br>
            
            <div class="text-center mb-4">
                <button type="submit" class="btn btn-danger btn-block z-depth-2" name="submit">Log in</button>
            </div>
            <p class="font-small grey-text d-flex justify-content-center">Don't have an account? <a href="register.php" class="dark-grey-text font-bold ml-1"> Sign up</a></p>
            <p class="font-small grey-text d-flex justify-content-center"><a href="#" class="dark-grey-text font-bold ml-1">Forgot Password</a></p>

            
            

        </div>

    </div>
        
    <!--/Form with header-->

</section>
            </form>
    </div>    

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script type="text/javascript">
    
   /* $("#submit").click(function(){
        
        $.ajax({
            type: "POST",
            url: "actions.php?action=login",
            data: "username="+ $("#username").val() + "&password=" + $("#password").val() + "&role=" + $("#role").val(),
            success: function(result){
                if(result=="student")
                    window.location.assign("student.php");
                else if(result=="teacher")
                    window.location.assign("teacher.php");
                else
                    {
                        $("#err").html(result);
                        $("#err").show();
                    }
                    
            }
        })
    })*/
    
    </script>
    
</body>

</html>
