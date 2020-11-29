
 
<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: sans-serif;
font-size: 18px;
text-align: left;
}
th {
background-color: #0080FF;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}

section.Top
{
  background-color: blue;
  height: 100px;
  width: auto;  
  text-align: center; 
  background-image: url("hd.jpeg");
  background-repeat: no-repeat;
  background-size: cover;
  color: white; 
  font-family: sans-serif;
}

button.close
{
  height:30px ;
  width:75px;
  font-size: 17px; 
  float: right;
  margin-right: 25px; 
  color:white; 
  background-color: #0080FF;
  border-radius: 5px;
  margin-top: 15px;
}

button.print
{
  height:30px ;
  width:75px;
  font-size: 17px; 
  float: right;
  margin-right: 25px; 
  color:white; 
  background-color: #0080FF;
  border-radius: 5px;
  margin-top: 15px;
}
div
{
  height: 200px;
  width: auto;  
    
}
a
{
  color: white;  
}

form.search
{
 font-family: verdana;
 font-size: 18px;
 text-align: center;
 

}
label
{

 color: white;
 font-family: verdana;   
}
input
{
width: 250px;
font-family: Verdana;
height: 30px;
}
section.plot
{
 background-color: #0080FF;
 background: url("header.jpeg");
 height: 150px;
 width: auto;
 background-repeat: no-repeat;
 background-size: cover;

}
button.search
{
background-color: #0080FF;
height: 30px;
width: 75px;
color:white ;
border-radius: 5px;
box-sizing: border-box;
font-size: 16px;

}
</style>

</head>
<body>
<section class="Top">
<br>
<button class="close"><a href="bookings.php">close</a></button>

<button class="print" onclick="myfunction()">Print</button>
<h2><strong>Report</strong></h2>
<br>
</section>
<br>
<div>
  
  
<table>
<tr>
<th>Title</th>
<th>Surname</th>
<th>Initials</th>
<th>Id Number</th>
<th>Gender</th>
<th>Date Booked</th>
<th>Time</th>
<th>Description</th>

</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "doctor");
// Check connection

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$filter=$_GET['filter'];
$sql = "SELECT Title,LastName,Substring(UPPER(FirstName),1,1) As Initials,IdNumber,Gender,AppoDate,Time,Description
 FROM patient
 Where  (AppoDate LIKE '%".$filter."%')
 or 
 (Description LIKE '%".$filter."%') 
 or  
 (FirstName LIKE '%".$filter."%')
 or 
 (IdNumber LIKE '%".$filter."%')
or 
(Title LIKE '%".$filter."%')
 or 
 (Gender LIKE '%".$filter."%')
or 
 (LastName LIKE '%".$filter."%')";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr>
<td>" . $row["Title"] . "</td>
<td>" . $row["LastName"] . "</td>
<td>". $row["Initials"]."</td>
<td>" . $row["IdNumber"]. "</td>
<td>" . $row["Gender"] . "</td>
<td>" . $row["AppoDate"] . "</td>
<td>" . $row["Time"] . "</td>
<td>" . $row["Description"] . "</td>
</tr>";
}
echo "</table>";
} else {  }
$conn->close();
?>
</table>
</div>

</body>

<script>
function myfunction()
{
window.print();  
}
</script>
</html>

