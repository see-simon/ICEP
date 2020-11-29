<?php

$link =mysqli_connect("localhost","root","","doctor");
if($link===false)
{
    
 die("ERROR:Could not Connect".mysqli_connect_errno()); 
}
$Title=mysqli_escape_string($link,$_REQUEST['Title']);
$FirstName=mysqli_escape_string($link,$_REQUEST['FirstName']);
$LastName=mysqli_escape_string($link,$_REQUEST['LastName']);
$IdNumber=mysqli_escape_string($link,$_REQUEST['IdNumber']);
$Gender=mysqli_escape_string($link,$_REQUEST['Gender']);
$PhoneNumber=mysqli_escape_string($link,$_REQUEST['PhoneNumber']);
$Email=mysqli_escape_string($link,$_REQUEST['Email']);
$AppoDate=mysqli_escape_string($link,$_REQUEST['AppoDate']);

 

$sql="INSERT INTO patient (Title, FirstName, LastName, IdNumber, Gender, PhoneNumber, Email, AppoDate) 
VALUES ('$Title', '$FirstName', '$LastName', '$IdNumber', '$Gender', '$PhoneNumber', '$Email', '$AppoDate')";
       
 if(mysqli_query($link,$sql))
 {
   
    require'success.php';
   
 }else
 {
    echo"ERROR:Could not be able to execute.$sql";
    
 }       

mysqli_close($link);
?>