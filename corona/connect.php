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
$Description=mysqli_escape_string($link,$_REQUEST['Description']);
$Time=mysqli_escape_string($link,$_REQUEST['Time']);

$currDate=date('Y-m-d');

if(isset($_POST['AppoDate']) && isset($_POST['Time'])){
   //Assign
  $Adate=$_POST['AppoDate'];
  $Atime=$_POST['Time'];
  //check record
  $connect=mysqli_connect("localhost","root","","doctor");
  
  $query="select *from patient where AppoDate='$Adate' and Time='$Atime'";
  $result=mysqli_query($connect,$query) or die(mysqli_error($connect));
  
  
  $row=mysqli_fetch_array($result);
  
  if($row['AppoDate']==$Adate && $row['Time']==$Atime)
  {
  
       echo'<script>alert("Selected time is already Booked.")</script>';    
 
  
  }
  else
  {
  
  
if($AppoDate==="")
 {

  echo "<script>alert('Select a date please.')</script>";
  require 'form.html';  

 }else
if($AppoDate < $currDate)
 {

  echo "<script>alert('Date should be Current date or on coming date.please select the date again.')</script>";
  require 'form.html';  
 }
 else 
 {
$sql="INSERT INTO patient (Title, FirstName, LastName, IdNumber, Gender, PhoneNumber, Email, AppoDate, Description,Time) 
VALUES ('$Title', '$FirstName', '$LastName', '$IdNumber', '$Gender', '$PhoneNumber', '$Email', '$AppoDate','$Description','$Time')";
       
 if(mysqli_query($link,$sql))
 {
   
    require'success.php';
   
 }else
 {
    echo"ERROR:Could not be able to execute.$sql";
    
 }       
   
 }

}
}
mysqli_close($link);
?>