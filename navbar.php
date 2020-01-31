<?php 
//Display guest welcome message, Login and Registration links
//when shopper has yet to login,
$content1 = "Welcome Guest<br/>";
$content2 = "<li><a href='register.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>
<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
</ul>";
             

if(isset($_SESSION["ShopperName"])) { 
    //Display a greeting message, Change Password and logout links 
    //after shopper has logged in.
    $content1 = "Welcome <b>$_SESSION[ShopperName]</b>";
    $content2 = "<li class='nav-item'>
                 <a class='nav-link' href='changepassword.php'>Change Password</a></li>
                <li class='nav-item'>
                 <a class='nav-link' href='logout.php'>Logout</a></li>";

	
}
?>
<!-- Display a navbar which is visible before or after collapsing -->
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Dynamic Text Display --> 
        <a href="/shopnow/index.php"><img src="images/logo3.png" alt="logo"></a>
        <span class="navbar-text ml-md 2"
                style="color:#F7BE81; max-width:80%;">
            <?php echo $content1; ?>
        </span>

        <!-- Toggler/Collapsible Button --> 
        <button class="navbar-toggler" type="button" data-toggle="collapse"
             data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        

<!-- To Do 4 (Practical 1) - 
     Define a collapsible navbar -->
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Collapsible part of navbar --> 
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <!-- left-justified menu items -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="category.php">Product Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search.php">Product Search</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shoppingCart.php">Shopping Cart</a>
                </li>
            </ul>

            <!-- Right-justified menu items --> 
            <ul class='nav navbar-nav navbar-right'>
                <?php echo $content2; ?>
            </ul>
        </div>
    </nav>
        


