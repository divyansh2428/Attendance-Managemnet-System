<?php
session_start();
include("connection.php");
$error="";

if(array_key_exists("action",$_GET))
{
    if($_POST["username"]=="")
        $error.="<p>Username field is empty</p>";
    if($_POST["password"]=="")
        $error.="<p>Password field is empty</p>";
    if($error!="")
        echo $error;
    else
    {
        $query="select no,role,name from users where username='".$_POST['username']." ' and password='".$_POST['password']."' and role='".$_POST['role']."' ";
        $result=mysqli_query($link,$query);
        if(mysqli_num_rows($result)>=1){  
            $row=mysqli_fetch_array($result);
            $_SESSION["id"]=$row[0];
            $_SESSION["name"]=$row[2];
            setcookie("id",$row[0],time()+365*24*60*60);
            if($row[1]=="Student")
                echo "student";
            else if($row[1]=="Faculty")
                echo "teacher";
        }
        else
          echo "NO RECORD FOUND";
    }
}


?>