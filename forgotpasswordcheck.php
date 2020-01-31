<?php 

session_start();
$MainContent = "";
$email = $_POST["email"];

//include class file for sql conn
include("mysql.php");
//create connection object to sql db
$conn = new Mysql_Driver();

//connect to db
$conn->connect();
//query to check for valid email and retrieve question 
$checkemail = "SELECT PwdQuestion from Shopper WHERE Email = '$email'";
//execute query
$result = $conn->query($checkemail);

// if query returns true 

if($result-> num_rows > 0)
{
    while($row = $conn->fetch_array($result))
    {
        // retrieve password recovery question and ask for answer
        $MainContent .= 
        " <form name='questionans' action='passwordreveal.php' method='post'>
        <div class='form-group row'>
        <label class='col-sm-3 col-form-label'>Your Password Recovery Question is : </label>
        <label class='form-control'>$row[PwdQuestion]<br/><br/>
        <label class='col-sm-3 col-form-label' for='passwordans'>Password Recovery Answer :</label>
        <input class='form-control' name='passwordans' id='passwordans' 
        type='text' required/> (required) <br/><br/>
        <div class='col-sm-9'>
       <button type='submit' class='btn btn-primary'>Submit</button>
        </div>";
       

    }

}

else
{
    $MainContent .=
    "Invalid Email!";
}

include("MasterTemplate.php");

?>