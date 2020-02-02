<?php
// Detect the current session
session_start();
$MainContent = "<div style='width:80%; margin:auto;'>";
$MainContent .= "<form name='register' action='feedbackupdate.php' method='post' 
                       onsubmit='return validateForm()'>";
$MainContent .= "<div class='form-group row'>";
$MainContent .= "<div class='col-sm-9 offset-sm-3'>";
$MainContent .= "<span class='page-title'>Give Feedback</span>";
$MainContent .= "</div>";
$MainContent .= "</div>";
//subject
$MainContent .= "<div class='form-group row'>";
$MainContent .= "<label class='col-sm-3 col-form-label' for='subject'>Subject:</label>";
$MainContent .= "<div class='col-sm-9'>";
$MainContent .= "<input class='form-control' name='subject' id='subject' 
                  type='text' required /> (required)";
$MainContent .= "</div>";
$MainContent .= "</div>";
//content 
$MainContent .= "<div class='form-group row'>";
$MainContent .= "<label class='col-sm-3 col-form-label' for='content'>Content:</label>";
$MainContent .= "<div class='col-sm-9'>";
$MainContent .= "<input class='form-control' name='content' id='content' 
                  type='text' required /> (required)";
$MainContent .= "</div>";
$MainContent .= "</div>";

//rank 
$MainContent .= "<div class='form-group row'>";
$MainContent .= "<label class='col-sm-3 col-form-label' for='rank'>Rank (1-5):</label>";
$MainContent .= "<div class='col-sm-9'>";
$MainContent .= "<input class='form-control' name='rank' id='rank' 
                  type='text' required /> (required)";
$MainContent .= "</div>";
$MainContent .= "</div>";

$MainContent .= "<div class='form-group row'>";       
$MainContent .= "<div class='col-sm-9 offset-sm-3'>";
$MainContent .= "<button type='submit' class='btn btn-primary'>Submit Feedback</button>";
$MainContent .= "</div>";
$MainContent .= "</div>";
$MainContent .= "</form>";

include("MasterTemplate.php");

?>