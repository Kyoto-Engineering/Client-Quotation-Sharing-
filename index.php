
<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user_id'])!="")
{

	header("Location:ImageGallery.php");
}


if(isset($_POST['btn-login']))
{
	$email = $_POST['email'];
	$upass =$_POST['pass'];
	
	
	$res=mysql_query("SELECT user_id,password FROM client_db WHERE email='$email'");
	$row=mysql_fetch_array($res);
       
	
	$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
	
	

	if($count == 1 && $row['password']==$upass)
	{
		$_SESSION['user_id'] = $row['user_id'];
		header("Location: ImageGallery.php");
	}
	else
	{
		?>
        <script>alert('User Email / Password Seems Wrong !');</script>
        <?php
	}
	
}
?>


<!DOCTYPE html>
<style>


.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #76b852; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #76b852, #8DC26F);
  background: -moz-linear-gradient(right, #76b852, #8DC26F);
  background: -o-linear-gradient(right, #76b852, #8DC26F);
  background: linear-gradient(to left, #76b852, #8DC26F);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}    
</style>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Client Login</title>
    <h1 style="color:black; text-align: center;">Kyoto Engineering & Automation</h1>
    </head>
    <body>
        <div class="login-page">
            <div class="form">
                <form class="login-form" method="post" name="login" onsubmit="validateForm()" >
                    <input type="text" placeholder="Email" name="email" />
                    <input type="password" placeholder="password" name="pass" />
                    <button type="submit" name="btn-login">login</button>
              </form>
            </div>
        </div>
        <form class="form" action="register.php">
            <button type="submit" name="register" >Register</button>
        </form>
    </body>
</html>


<script>
    $('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>

<script type="text/javascript">
function validateForm() {
    
 var x = document.forms["login"]["email"].value;
    if (x == null || x == "") {
        alert("Seems like you missed the Email tab");
        return false;
   } 

    var x = document.forms["login"]["pass"].value;
    if (x == null || x == "") {
        alert("Please fill out the password field.");
        return false;
   }
  }
  
</script>

