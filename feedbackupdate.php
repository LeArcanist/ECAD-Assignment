<?php
// detect current session
session_start();
$MainContent = "";
$sessionid =  $_SESSION["ShopperID"];

$subject = $_POST["subject"];
$content = $_POST["content"];
$rank = $_POST["rank"];

//include class file for sql database acesss
include("mysql.php");

//create connection object to sql db
$conn = new Mysql_Driver();

//connect to db
$conn->connect();

//define insert statement (sql)
$feedback = "INSERT INTO Feedback (ShopperID, Subject, Content, Rank)
VALUES ('$sessionid', '$subject', '$content', '$rank')";

$insertfeedback = $conn->query($feedback);

if($insertfeedback == true)
{
    //retrieve shopper id assigned to new shopper
    $qry = "SELECT LAST_INSERT_ID() AS FeedbackID";
    $result = $conn->query($qry);

    $MainContent .="<h1>Thank You For Your Feedback!</h1>";
    
}

include("MasterTemplate.php")
?>