<?php

$username=$_POST['username'];
$password=$_POST['password'];

$username=stripcslashes($username);
$password=stripslashes($password);
$username= mysqli_real_escape_string($username);
$password= mysqli_real_escape_string($password);

mysqli_connect("localhost","root","","doctor");

$result=mysqli_query("select * from admin where username='$username' and password='$password'")
or die("Failed".mysqli_error());
$row=mysqli_fetch_array($result);

if($row['username']==$username && $row['password']==$password)
{
  echo("bookings.php");  
}else
{
 echo("Wrong username and password");   
    
}
?>