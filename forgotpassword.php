<?php
// input for email
session_start();
$MainContent = "";
$MainContent .= "<form name='forgotpassword' action='forgotpasswordcheck.php' method='post'>";
$MainContent .= "<p>Please provide your email for verification.</p>";
$MainContent .= "<div class='form-group row'>";
$MainContent .= "<label class='col-sm-3 col-form-label' for='email'>
                 Email Address:</label>";
$MainContent .= "<div class='col-sm-9'>";
$MainContent .= "<input class='form-control' name='email' id='email' 
                  type='email' required /> (required)";
$MainContent .= "</div>";
$MainContent .= "</div>";

$MainContent .= "<div class='col-sm-9 offset-sm-3'>";
$MainContent .= "<button type='submit' class='btn btn-primary'>Submit</button> </form>";

include ("MasterTemplate.php");
?>