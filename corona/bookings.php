 
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
 background: url("heading.jpeg");
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
.up
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
<button class="close"><a href="login.html">close</a></button>
<h2><strong>Booked Appointments</strong></h2>
<br>
</section>
<br>
<div>
    <section class="plot">
            <br>
             <h3 style="color:white; text-align: center; font-family: sans-serif;"><strong>Search here!!</strong></h3>
    <form class="search" action="report.php" method="GET">
    <input type="text" name="filter"  required>
    <button class="search" type="submit" name="Search">Search</button>
    
    </form> 
    
    </section>
 <br>  
<table>
<tr>

        <th>Title</th>
        <th>Surname</th> 
        <th>Name</th>
        <th>Id Number</th>
        <th>Gender</th>
        <th>Phone</th>
        <th>E mail</th>
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


$sql = "SELECT * FROM patient";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr>
<td>" . $row["Title"]."</td>
<td>" . $row["LastName"]."</td>
<td>" . $row["FirstName"] . "</td>
<td>" . $row["IdNumber"]. "</td>
<td>" . $row["Gender"] . "</td>
<td>" . $row["PhoneNumber"]."</td>
<td>" . $row["Email"]. "</td>
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
</html>

