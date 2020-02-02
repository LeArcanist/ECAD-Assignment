<?php
// detect current session
session_start();
$MainContent = "";

//include class file for sql conn
include("mysql.php");
//create connection object to sql db
$conn = new Mysql_Driver();

$sessionid =  $_SESSION["ShopperID"];

$MainContent .= "<h1 style='text-align:center;'>Feedbacks</h1>";

//connect to db
$conn->connect();
//query to check for valid email and retrieve question 
$details = "SELECT * from Feedback";
//execute query
$result = $conn->query($details);

if($result-> num_rows > 0)
{
    while($row = $conn->fetch_array($result))
    {
        $MainContent .=
        "
        <div class='form-group row'>
        <label class='form-control'> Subject : $row[Subject] <br/> </label><br/><br/>
        <label class='form-control'> Content : $row[Content] <br/> </label><br/><br/>
        <label class='form-control'> Rank : $row[Rank] <br/> </label><br/><br/></div>";

        $shopper = "SELECT Name from Shopper WHERE ShopperID = $row[ShopperID]";
        $getname = $conn->query($shopper);
        if($getname-> num_rows > 0)
        {
            
            while($row = $conn->fetch_array($getname))
            {
                $MainContent .= "<p style='text-align:right;'>Feedback by: $row[Name] <br/><br/></p>";
            }
        }
        
    }
}

$MainContent .= "
<form name='feedback' action='givefeedback.php' method='post'>
        <div class='col-sm-9'>
        <button type='submit' class='btn btn-primary'>Give Feedback</button><br/><br/>
        </div></form>
 <div class='col-sm-9'>
 <a href='/shopnow/index.php'><button  class='btn btn-primary'>Back</button></a>
 </div>";

include("MasterTemplate.php");
?>