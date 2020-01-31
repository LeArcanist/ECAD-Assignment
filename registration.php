<?php 
// detect current session
session_start();
$MainContent = "";

//Read data from previous page
$name= $_POST["name"];
$address= $_POST["address"];
$country= $_POST["country"];
$phone= $_POST["phone"];
$email= $_POST["email"];
$password= $_POST["password"];
$passqn= $_POST["passwordqn"];
$passans= $_POST["passwordans"];

//include class file for sql database acesss
include("mysql.php");

//create connection object to sql db
$conn = new Mysql_Driver();

//connect to db
$conn->connect();

//define insert statement (sql)
$qry = "INSERT INTO Shopper (Name, Address, Country, Phone, Email, Password, PwdQuestion, PwdAnswer)
VALUES ('$name', '$address', '$country', '$phone', '$email', '$password', '$passqn', '$passans')";

$duplicate = "SELECT * from Shopper WHERE Email = '$email'";

//execute duplicate sql 
$result = $conn->query($duplicate);

if($result-> num_rows > 0)
{
   /* header("Location: register.php?message=Email id already exists.");*/
   $MainContent .= 
    "Duplicate Email!<br/>";

}

elseif ($result-> num_rows == 0)
{
    $result = $conn->query($qry);
    if ($result == true)
    //executed sucessfully 
    //retrieve shopper id assigned to new shopper
    $qry = "SELECT LAST_INSERT_ID() AS ShopperID";
    $result = $conn->query($qry);

    //save shopper id in session varaible
    while($row = $conn->fetch_array($result))
    {
        $_SESSION["ShopperID"] = $row ["ShopperID"];
    }

    //display successful message 
    $MainContent .= 
    "Registration Successful!<br/>
    Your Shopper ID is $_SESSION[ShopperID] <br/>";
    // save shopper name in session variable 
    $_SESSION["ShopperName"] = $name;
}

else
{ // display error 
    $MainContent .="<h3 style='color:red'>Error in inserting record</h3>";
}

//close db connection
$conn->close();

//include master template
include("MasterTemplate.php");
?>