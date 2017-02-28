<?php


session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user1']))
{
	header("Location: index.php");
}

?>



<!DOCTYPE html>
<style>
    form .leave-submit input {
  display: block;
  width: 100px;
  height: 100px;
  background-color: transparent;
  background-image: url(image/submit.gif);
  background-repeat: no-repeat;
  background-position: 0 0;
  padding: 0;
  margin: 0;
  border: none;
  border-radius: 50%;

  cursor: pointer;
  text-indent: -9000px;
  margin-top:520px;
  position:absolute;
  
  margin-left:50px;
}
</style>
<head>
<h1 style="color: blue; text-align: center;">Kyoto Engineering & Automation</h1>
<h2 style="color: blue; text-align: center;">Clients Information</h2>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.0.js"></script>
<script type="text/javascript">
$(function(){
    $('.leave-submit').click(function(){
        var url='data:application/vnd.ms-excel,' + encodeURIComponent($('#body').html()) 
        location.href=url
        return false
    })
})
</script>
</head>
<body>
<div id="header">

</div>
<div id="body">
    <form method="post">
	<table width="100%" border="4">
    
            <tr>
            <td border="4">ID</td>
            <td>USER ID</td>
            <td>CLIENT NAME</td>
            <td>COMPANY NAME</td>
            <td>EMAIL</td>
            <td>Action</td>
            </tr>


            <?php
                $i=0;
                $sql="SELECT * FROM client_db ORDER BY id";
                $result_set=mysql_query($sql);
                while($row=mysql_fetch_array($result_set))
                {
                    $i++;
                        ?>
                <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['user_id'] ?></td>
                <td><?php echo $row['client_name'] ?></td>
                <td><?php echo $row['company_name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><a href="edit.php?id=<?php echo $row['id'];?>">EDIT</a><br><a href="client_delete.php?id=<?php echo $row['id'];?>">DELETE</a></td>
                </tr>
                <?php
                }
                ?>
        </table>
        
    </form>
</div>
        
</body>
</html>

