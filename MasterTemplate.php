<!doctype html>
<html>
<head> 
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initialscale=1">

<!-- Title of Webpage-->
<title>ShopNow</title>

<!-- Latest compiled and minified CSS --> 
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- jQuery library-->
<script src="js/jquery-3.3.1min.js"></script>

<!--Latest Compiled Javascript -->
<script src="js/bootstrap.min.js"></script>

<!-- Site specific Cascading Stylesheet --> 
<link rel="stylesheet" href="css/site.css">

</head>

<body>
    <div class="container-fluid">
        <!-- 2nd Row --> 
        <div class="row">
          <div class="col">
            <?php include("navbar.php"); ?>
          </div>
        </div>

        <div class="container-fluid">
        <!-- 2nd Row --> 
        <div class="row">
          <div class="col">
            <?php 
            echo $MainContent; ?>
          </div>

  </div>      
</body>  
    
        