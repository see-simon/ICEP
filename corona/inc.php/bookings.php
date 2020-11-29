 
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
  background-image: url("img/hd.jpeg");
  background-repeat: no-repeat;
  background-size: cover;
  color: white; 
  font-family: sans-serif;
}

button
{
  height:45px ;
  width:45px;
  font-size: 18px; 
  float: right;
  margin-right: 9px; 
  color:white; 
  background-color: #0080FF;
  border-radius: 10px;
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
</style>

</head>
<body>
<section class="Top">
<br>
<button class="close"><a href="login.html">X</a></button>
<h2><strong>Booked Appointments</strong></h2>
<br>
</section>
<br>
<div>
<table>
<tr>

<th>Name</th>
<th>Surname</th>
<th>Id.No</th>
<th>Gender</th>
<th>Phone</th>
<th>Email</th>
<th>Appoint.date</th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "doctor");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM patient";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr>

<td>" . $row["FirstName"] . "</td>
<td>". $row["LastName"]."</td>
<td>" . $row["IdNumber"]. "</td>
<td>" . $row["Gender"] . "</td>
<td>". $row["PhoneNumber"]."</td>
<td>" . $row["Email"]. "</td>
<td>" . $row["AppoDate"] . "</td>
</tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</div>

</body>
</html>

