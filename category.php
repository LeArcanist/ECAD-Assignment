<?php 
// Detect the current session
session_start();
// Create a container, 60% width of viewport
$MainContent = "<div style='width:60%; margin:auto;'>";
// Display Page Header.
$MainContent .= "<div class='row' style='padding:5px'>"; // Start header row
$MainContent .= "<div class='col-12'>";
$MainContent .= "<span class='page-title'>Product Categories</span>";
$MainContent .= "<p>Select a category listed below:</p>";
$MainContent .= "</div>";
$MainContent .= "</div>"; // End header row

include("mysql.php");  // Include the class file for database access

// Check if user logged in 
//if (! isset($_SESSION["ShopperName"])) {
//	// redirect to login page if the session variable shopperid is not set
//	header ("Location: login.php");
//	exit;
//}


$conn = new Mysql_Driver();  // Create an object for database access
$conn->connect(); // Open database connnection

// To Do:  Starting ....
$qry = "select * from category"; //sql to select all catergories
$result = $conn->query($qry); //execute the sql statement

//display
while($row = $conn->fetch_array($result))
{
	$MainContent .= "<div class='row' style='padding:5px'>";// new row
	//left column - display a text link showing category's name
	//display category's descriptinon in a new paragraph
	$catname = urlencode($row["CatName"]);
	$catproduct = "catProduct.php?cid=$row[CategoryID]&catName=$catname";
	$MainContent .= "<div class='col-8'>";//67% of row width
	$MainContent .= "<p><a href=$catproduct>$row[CatName]</a></p>";
	$MainContent .= "$row[CatDesc]";
	$MainContent .= "</div>";
	//right column - display category's image
	$img = "./Images/category/$row[CatImage]";
	$MainContent .= "<div class='col-4'>";
	$MainContent .= "<img src='$img' />";
	$MainContent .= "</div>";
	$MainContent .= "</div>"; //End of a row
}


// To Do:  Ending ....

$conn->close(); // Close database connnection
$MainContent .= "</div>"; // End of container
include("MasterTemplate.php"); 
?>
