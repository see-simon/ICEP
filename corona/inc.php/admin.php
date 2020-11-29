<?php 

$username=$_POST['username'];
$password=$_POST['password'];

if($username=='662255' && $password=='kabelo#10')
{

require'bookings.php';


}
else
{
echo("youre not the admin");

}

?>

