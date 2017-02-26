<?php
include_once 'dbconnect.php';


if(!empty(isset($_POST['btn-login'])))
{
    $client_id=$_POST['user_id'];
    $client_name=$_POST['name'];
    $company_name=$_POST['cname'];
    $client_email=$_POST['email'];
    $client_pass=$_POST['pass'];
    
    
    $conn = mysqli_connect('localhost', 'root','','kealcom_dbtest');
    $insert="INSERT INTO `client_db` (`id`, `user_id`,`client_name`,`company_name`,`email`, `password`) VALUES (NULL,'$client_id','$client_name','$company_name','$client_email','$client_pass')";
    $result= mysqli_query($conn,$insert);
   
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
    </head>
    <body>
        <div class="login-page">
            <div class="form">
                <form class="login-form" method="post" action="index.php"  name="registration" onsubmit="validateForm()">
                    <input type="text" placeholder="User ID/ User Name" name="user_id" required/>
                    <input type="text" placeholder="Client Name" name="name"/>
                    <input type="text" placeholder="Company Name" name="cname"/>
                    <input type="text" placeholder="Email" name="email"/>
                    <input type="password" placeholder="password" name="pass"/>
                    <button type="submit" name="btn-login">Register</button>
              </form>
            </div>
             <form class="form" action="index.php">
            <button type="submit" name="login" >Login</button>
            </form>
        </div>
    </body>
</html>


<script>
    $('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>

<script type="text/javascript">
function validateForm() {
    var x = document.forms["registration"]["name"].value;
    if (x == null || x == "") {
        alert("Client Name must be filled out");
        return false;
   }
 var x = document.forms["registration"]["cname"].value;
    if (x == null || x == "") {
        alert("Company Name must be filled out");
        return false;
   } 
   
   
    var x = document.forms["registration"]["email"].value;
    if (x == null || x == "") {
        alert("Please fill out the Email field.");
        return false;
   }

    var x = document.forms["registration"]["pass"].value;
    if (x == null || x == "") {
        alert("Please fill out the password field.");
        return false;
   }
  }
</script>

