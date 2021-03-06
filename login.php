<?php 
    // detect the current session
    session_start();
    //create a centrally located container
    $MainContent = "<div style='width:80%; margin:auto;'>";
        //create a html form within the container 
        $MainContent .= "<form action='checklogin.php' method='post'>";
            // 1st row -- Header Row 
            $MainContent .="<div class='form-group row'>";
            $MainContent .="<div class='col-sm 9 offset-sm 3'>";
            $MainContent .="<span class='page-title'>Member Login</span>";
            $MainContent .="</div>";
            $MainContent .="</div>";
            //2nd row  - Entry of email address
            $MainContent .="<div class='from-group row'>";
            $MainContent .= "<label class='col-sm-3 col-form-label' for='email'>Email Address</label>";
            $MainContent .="<div class='col-sm-9'>";
            $MainContent .="<input class='form-control' type ='email' name='email' id='email' required/>";
            $MainContent .="</div>";
            $MainContent .="</div>";
            // 3rd row - entry of password
            $MainContent .="<div class='from-group row'>";
            $MainContent .= "<label class='col-sm-3 col-form-label' for='password'>Password</label>";
            $MainContent .="<div class='col-sm-9'>";
            $MainContent .="<input class='form-control' type ='password' name='password' id='password' required/> <br/>";
            $MainContent .="</div>";
            $MainContent .="</div>";
            //4th row -Login Button
            $MainContent .="<div class='form-group-row'>";
            $MainContent .="<div class='col-sm-9 offset-sm-3'>";
            $MainContent .="<button type='submit' class='btn btn-primary'>Login</button> <br/><br/>";
            $MainContent .="<p>Please sign up if you do not have an account</p>";
            $MainContent .="<a href='forgotpassword.php'>Forgot your Password?</a>";
            $MainContent .="</div>";
            $MainContent .="</div>";

        $MainContent .="</form>";

    $MainContent .="</div>";

    // include the page layout template
    include("MasterTemplate.php")
?>

