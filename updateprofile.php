<script type="text/javascript">
function validateForm()
{
    // To Do 1 - Check if password matched
    if(document.register.password.value !- document.register.password2.value)
    {
        alert("Passwords not matched!");
        return false; //cancel submission
    }
	
	// To Do 2 - Check if telephone number entered correctly
	//           Singapore telephone number consists of 8 digits,
	//           start with 6, 8 or 9
    if(document.register.phone.value != "")
    {
        var str = document.register.phone.value;
        if(str.length !=8)
        {
            alert("Please enter a 8-digit phone number.");
            return false; //cancel submission
        }

        else if (str.substr(0,1) !="6" &&
                 str.substr(0,1) !="8" &&
                 str.substr(0,1) !="9")
                 {
                    alert("Phone Number in Singapore should start with 6, 8 or 9.");
                    return false; //cancel submission
                 }
    }
    return true;  // No error found
}
</script>

<?php
// detect current session
session_start();
$MainContent = "";

//include class file for sql conn
include("mysql.php");
//create connection object to sql db
$conn = new Mysql_Driver();

$sessionid =  $_SESSION["ShopperID"];

//connect to db
$conn->connect();
//query to check for valid email and retrieve question 
$details = "SELECT * from Shopper WHERE ShopperID = $sessionid";
//execute query
$result = $conn->query($details);

if($result-> num_rows > 0)
{
    while($row = $conn->fetch_array($result))
    {

        $MainContent .=
        "<form name='profileupdate' action='updateprofilecheck.php' method='post'
        onsubmit='return validateForm()>
        <div class='form-group row'>
        <label class='col-sm-3 col-form-label'>Name: </label>
        <input class='form-control' name='name' id='name' 
        type='text' value = '$row[Name]'/>  <br/><br/>
        <label class='col-sm-3 col-form-label'>BirthDate: </label>
        <input class='form-control' name='birthdate' id='birthdate' 
        type='text' value = '$row[BirthDate]'/>  <br/><br/>
        <label class='col-sm-3 col-form-label'>Address: </label>
        <input class='form-control' name='address' id='address' 
        type='text' value = '$row[Address]'/>  <br/><br/>
        <label class='col-sm-3 col-form-label'>Country: </label>
        <input class='form-control' name='country' id='country' 
        type='text' value = '$row[Country]'/>  <br/><br/>
        <label class='col-sm-3 col-form-label'>Phone: </label>
        <input class='form-control' name='phone' id='phone' 
        type='text' value = '$row[Phone]'/>  <br/><br/>
        <label class='col-sm-3 col-form-label'>Email: </label>
        <input class='form-control' name='email' id='email' 
        type='text' value = '$row[Email]'/>  <br/><br/>
        <label class='col-sm-3 col-form-label'>Password: </label>
        <input class='form-control' name='password' id='password' 
        type='text' value = '$row[Password]'/>  <br/><br/>
        <label class='col-sm-3 col-form-label'>Password Recovery Question: </label>
        <input class='form-control' name='passwordqn' id='passwordqn' 
        type='text' value = '$row[PwdQuestion]'/>  <br/><br/>
        <label class='col-sm-3 col-form-label'>Password Recovery Answer: </label>
        <input class='form-control' name='passwordans' id='passwordans' 
        type='text' value = '$row[PwdAnswer]'/>  <br/><br/><br/>
        <div class='col-sm-9'>
       <button type='submit' class='btn btn-primary'>Update Profile</button>
        </div></form>
        <div class='col-sm-9'>
        <a href='/shopnow/index.php'><button  class='btn btn-primary'>Back</button></a>
        </div>";
    }
}

include("MasterTemplate.php");
?>