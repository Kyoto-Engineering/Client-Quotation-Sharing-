<?php

include'dbconnect.php';     
if(isset($_REQUEST['id'])){
    $id= $_REQUEST['id'];
    
    
    $result = mysql_query("delete from client_db WHERE id='$id'");
    header('location:client_page.php');
}
else
{
    header('location:client_page.php');
}

?>