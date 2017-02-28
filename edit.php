<?php

include'dbconnect.php';     
if(isset($_REQUEST['id'])){
    $id= $_REQUEST['id'];
}
else
{
    header('location:client_page.php');
}

if(isset($_POST['submit'])){
    
    try {
        
        if(empty($_POST['client_id'])){
        throw new Exception('Client ID Can not be Empty');
        }
        
        if(empty($_POST['client_name'])){
        throw new Exception('Client Name Can not be Empty');
        }
        
        if(empty($_POST['company_name'])){
        throw new Exception('Company Name Can not be Empty');
        }
        
        if(empty($_POST['email'])){
        throw new Exception('Email Can not be Empty');
        }
        
        if(empty($_POST['pass'])){
        throw new Exception('Password Can not be Empty');
        }
        
        
        $result = mysql_query("update client_db set user_id='$_POST[client_id]',client_name='$_POST[client_name]',company_name='$_POST[company_name]', email='$_POST[email]',password='$_POST[pass]' WHERE id='$id'");
        $success_message='Data has been udated successfully';
        
    }
    
   //catch exception
    catch(Exception $e) {
      $error_message = $e->getMessage();
    }
}

?>













<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<style>
    body {
	background-color : #48484;
	margin: 0;
	padding: 0;
}
h1 {
	color : #000000;
	text-align : center;
	font-family: "SIMPSON";
}
form {
	width: 300px;
	margin: 0 auto;
}
</style>

<html>
    <head>
        <title>Update Client</title>
        <h1 style="color: blue; text-align: center;">Update Client</h1>
        
    </head>
    <body>
        <?php
            if(isset($error_message)) {echo $error_message;}
            if(isset($success_message)) {echo $success_message;}
        ?>
            
        <br></br>
        
        <?php
        $sql="SELECT * FROM client_db WHERE id='$id'";
                $result_set=mysql_query($sql);
                while($row=mysql_fetch_array($result_set))
                {
                   
                    $client_id_old = $row['user_id'];
                    $client_name_old = $row['client_name'];
                    $company_name_old = $row['company_name'];
                    $email_old = $row['email'];
                    $password_old = $row['password'];
                    
                }
        
        ?>
        
        
        
        <form action="" method="POST" name="update" >
            <table>
                <tr>
                    <td><label>CLIENT ID:</label></td>
                    <td><input type="text" name="client_id" value="<?php echo $client_id_old ;?>"  ></input></td>
                </tr>
                <tr>
                    <td><label>CLIENT NAME:</label></td>
                    <td><input type="text" name="client_name" value="<?php echo $client_name_old ;?>" ></input></td>
                </tr>
                <tr>
                    <td><label>COMPANY NAME:</label></td>
                    <td><input type="text" name="company_name" value="<?php echo $company_name_old ;?>" ></input></td>
                </tr>
                <tr>
                    <td><label>EMAIL:</label></td>
                    <td><input type="text" name="email" value="<?php echo $email_old ;?>" ></input></td>
                </tr>
                <tr>
                    <td><label>PASSWORD:</label></td>
                    <td><input type="text" name="pass" value="<?php echo $password_old ;?>" ></input></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Update"></input></td>
                </tr>
                <tr>
                    <td></td>
                    <td><a href="client_page.php">Go To Client Page</a></td>
                </tr>
            </table>
            
            

        </form>
    </body>
</html>