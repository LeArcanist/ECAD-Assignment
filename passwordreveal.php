<?php 

session_start();
$MainContent = "";
$MainContent .= "<h1 style='text-align:center;'>Password Recovery</h1>";
$answer = $_POST["passwordans"];

//include class file for sql conn
include("mysql.php");
//create connection object to sql db
$conn = new Mysql_Driver();

//connect to db
$conn->connect();
//query to check for valid email and retrieve question 
$checkanswer = "SELECT Password from Shopper WHERE PwdAnswer = '$answer'";
//execute query
$result = $conn->query($checkanswer);

if($result-> num_rows > 0)
{
    while($row = $conn->fetch_array($result))
    {
        $MainContent .= "
        <div class='form-group row'>
        <label class='col-sm-3 col-form-label'> Congrats! Your Password is : </label>
        <label class='form-control'>$row[Password]<br/><br/>";
    }
}

else
{
    $MainContent .=
    "<p>Wrong Answer to Question! Please go back to previous page using browser back button</p>";
}
include("MasterTemplate.php");
?>