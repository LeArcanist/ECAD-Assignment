<?php
// Detect the current session
session_start();
$MainContent = "";
// Reading inputs entered in previous page
$email = $_POST["email"];
$pwd = $_POST["password"];

//include class file for sql database acesss
include("mysql.php");

//create connection object to sql db
$conn = new Mysql_Driver();

//connect to db
$conn->connect();
//sql statement
$qry = "SELECT ShopperID, Name  FROM Shopper WHERE Email = '$email' && Password = '$pwd' ";

//execute sql 
$result = $conn->query($qry);

//if query successful
if($result-> num_rows > 0)
{
	while($row = $conn->fetch_array($result))
	{
		//assign shopper name and id to session
		$shoppersname = $row[Name];
		$shoppersid = $row[ShopperID];
		$_SESSION["ShopperName"] = $shoppersname;
		$_SESSION["ShopperID"] = $shoppersid;
	
	}

		// Redirect to home page
		header("Location: index.php");

}
	
else {
	$MainContent = "<h3 style='color:red'>Invalid Login Credentials</h3>";
}
	
include("MasterTemplate.php");
?>