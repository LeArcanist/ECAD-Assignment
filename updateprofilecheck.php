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


//retrieve CURRENT info
//$details = "SELECT * from Shopper WHERE ShopperID = '$sessionid'";
//$result = $conn->query($details);



// Check for unique email
$email_qry = "SELECT * FROM Shopper WHERE ShopperID <> '$sessionid' AND Email = '$email'";
$email_result = $conn->query($email_qry);

if($conn->num_rows($email_result)>0) {
    $MainContent .= "<h3 style='color:red'>Email must be unique. Existing account has been created with email.</h3>";
}

else
{
    //update query
    $update = "UPDATE Shopper SET Name= '$name', BirthDate= '$birthdate', Address= '$address', Country= '$country', Phone= '$phone', Email= '$email', Password= '$password', PwdQuestion= '$passqn', PwdAnswer= '$passans' WHERE ShopperID= $sessionid";
    //execute query to update 
    $conn->query($update);
    //retrieve new info
    $details = "SELECT * from Shopper WHERE ShopperID = '$sessionid'";
    $result = $conn->query($details);

    if($result-> num_rows > 0)
    {
        while($row = $conn->fetch_array($result))
        {
            $MainContent .= 
            "Updated Profile : <br/><br/>
            <div class='form-group row'>
            <label class='col-sm-3 col-form-label'>Name: </label>
            <input class='form-control' name='name' id='name' 
            type='text' value = '$row[Name]'/>  <br/><br/>
            <label class='col-sm-3 col-form-label'>BirthDate: </label>
            <input class='form-control' name='birthdate' id='birthdate' 
            type='text' value = '$row[BirthDate]'/>  <br/><br/>
            <label class='col-sm-3 col-form-label'>Address: </label>
            <input class='form-control' name='address' id='address' 
            type='text' value = '$row[Address]'/>  <br/><br/>
            <label class='col-sm-3 col-form-label'>Country: </label>
            <input class='form-control' name='country' id='country' 
            type='text' value = '$row[Country]'/>  <br/><br/>
            <label class='col-sm-3 col-form-label'>Phone: </label>
            <input class='form-control' name='phone' id='phone' 
            type='text' value = '$row[Phone]'/>  <br/><br/>
            <label class='col-sm-3 col-form-label'>Email: </label>
            <input class='form-control' name='email' id='email' 
            type='text' value = '$row[Email]'/>  <br/><br/>
            <label class='col-sm-3 col-form-label'>Password: </label>
            <input class='form-control' name='password' id='password' 
            type='text' value = '$row[Password]'/>  <br/><br/>
            <label class='col-sm-3 col-form-label'>Password Recovery Question: </label>
            <input class='form-control' name='passwordqn' id='passwordqn' 
            type='text' value = '$row[PwdQuestion]'/>  <br/><br/>
            <label class='col-sm-3 col-form-label'>Password Recovery Answer: </label>
            <input class='form-control' name='passwordans' id='passwordans' 
            type='text' value = '$row[PwdAnswer]'/>  <br/><br/><br/>
            <div class='col-sm-9'>";

        }
    }
}

include("MasterTemplate.php");
?>