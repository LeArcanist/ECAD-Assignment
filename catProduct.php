<?php

session_start();

$MainContent = "<div style='width:60%; margin:auto>'>";

$MainContent .= "<div class='row' style='padding:5px'>";
$MainContent .= "<div class='col-12'>";
$MainContent .= "<span class='page-title'$_GET[catName]</span>";
$MainContent .= "</div>";
$MainContent .= "</div>";

include("mysql.php");
$conn = new MySql_Driver();
$conn->connect();

$cid=$_GET["cid"];

$qry = "SELECT p.ProductID, p.ProductTitle, p.ProductImage, p.Price, p.Quantity
    FROM catproduct cp INNER JOIN product p ON cp.ProductID = p.ProductID
    WHERE cp.CategoryID=$cid";

$result = $conn->query($qry);
while ($row = $conn->fetch_array($result))
{
    $MainContent .= "<div class ='row' style='padding:5px'>";

    $product = "productDetails.php?pid=$row[ProductID]";
    $formattedPrice = number_format($row["Price"], 2);
    $MainContent .= "<div class='col-8'>";
    $MainContent .= "<p><a href=$product>$row[ProductTitle]</a></p>";
    $MainContent .= "Price:<span style='font-weight:bold; color:red;'>
                    S$ $formattedPrice</span>";
    $MainContent .= "</div>";
    
    $img = "./Images/Products/$row[ProductImage]";
    $MainContent .= "<div class ='col-4'>";
    $MainContent .= "<img src='$img' />";
    $MainContent .= "</div>";

    $MainContent .= "</div>";
}

$conn->close();
$MainContent .= "</div>";
include("MasterTemplate.php");

?>