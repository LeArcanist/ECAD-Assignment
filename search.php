<?php 
// Detect the current session
include("mysql.php");
session_start();

// Check if user logged in 
if (! isset($_SESSION["ShopperName"])) {
	// redirect to login page if the session variable shopperid is not set
	header ("Location: login.php");
	exit;
}


// HTML Form to collect search keyword and submit it to the same page 
// in server
$MainContent = "<div style='width:80%; margin:auto;'>"; // Container
$MainContent .= "<form name='frmSearch' method='get' action=''>";
$MainContent .= "<div class='form-group row'>"; // 1st row
$MainContent .= "<div class='col-sm-9 offset-sm-3'>";
$MainContent .= "<span class='page-title'>Product Search</span>";
$MainContent .= "</div>";
$MainContent .= "</div>"; // End of 1st row
$MainContent .= "<div class='form-group row'>"; // 2nd row
$MainContent .= "<label for='keywords' 
                  class='col-sm-3 col-form-label'>Product Title:</label>";
$MainContent .= "<div class='col-sm-6'>";
$MainContent .= "<input class='form-control' name='keywords' id='keywords' 
                  type='search' />";
$MainContent .= "</div>";
$MainContent .= "<div class='col-sm-3'>";
$MainContent .= "<button type='submit'>Search</button>";
$MainContent .= "</div>";
$MainContent .= "</div>";  // End of 2nd row
$MainContent .= "</form>";


// The search keyword is sent to server
if (isset($_GET['keywords'])) {
	
	$SearchText=$_GET["keywords"];
	
	$conn = new Mysql_Driver();
	$conn->connect();

	$qry = "SELECT * from product WHERE ProductTitle LIKE '%$SearchText%'";
	$result = $conn->query($qry);
	while ($row = $conn->fetch_array($result))
	{
			//start a new row
			$MainContent .= "<div class='row' style='padding:5px'>";
			//left column - display a text link showing the product's name
			//Display that selling price in red in a new paragraph
			$product = "productDetails.php?pid=$row[ProductID]";
			$formattedPrice = number_format($row["Price"], 2);
			$MainContent .= "<div class='col-8'>"; // 67% of row width
			$MainContent .= "<p><a href=$product>$row[ProductTitle]</a></p>";
			$MainContent .= "Price:<span style='font-weight:bold; color:red;'>
							S$ $formattedPrice</span>";
			$MainContent .= "</div>";
			
			//Right column
			$img = "./Images/products/$row[ProductImage]";
			$MainContent .= "<div class='col-4'>";//33% of row width
			$MainContent .= "<img src='$img '/>";
			$MainContent .= "</div>";
			$MainContent .= "</div>"; //End of row
	}
}

$MainContent .= "</div>"; // End of Container
include("MasterTemplate.php");
?>