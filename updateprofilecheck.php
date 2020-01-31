<?php
// detect current session
session_start();
$MainContent = "";

//include class file for sql conn
include("mysql.php");
//create connection object to sql db
$conn = new Mysql_Driver();

$sessionid =  $_SESSION["ShopperID"];

$name= $_POST["name"];
$birthdate= $_POST["birthdate"];
$address= $_POST["address"];
$country= $_POST["country"];
$phone= $_POST["phone"];
$email= $_POST["email"];
$password= $_POST["password"];
$passqn= $_POST["passwordqn"];
$passans= $_POST["passwordans"];

//connect to db
$conn->connect();
//query to check for duplicate email
$duplicate = "SELECT * from Shopper WHERE Email = '$email'";



//execute query
$result = $conn->query($duplicate);

if($result-> num_rows > 0)
{
   $MainContent .= 
    "Duplicate Email!<br/>";

}

else
{
    //update query
    $update = "UPDATE Shopper SET Name= '$name', BirthDate= '$birthdate', Address= '$address', Country= '$country', Phone= '$phone', Email= '$email', Password= '$password', PwdQuestion= '$passqn', PwdAnswer= '$passans' WHERE ShopperID= $sessionid";
    $result = $conn->query($update);
    header("Location: index.php");
}

include("MasterTemplate.php");
?>