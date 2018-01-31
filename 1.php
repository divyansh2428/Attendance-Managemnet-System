<?php
include("connection.php");
$query="select IFNULL( 'Hello','select * from users where name="psu") ";
$result=mysqli_query($link,$query);
echo $result;
?>