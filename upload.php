<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user_id']))
{
	header("Location: index.php");
}


date_default_timezone_set('Asia/Dhaka');
session_start();
include_once 'dbconnect.php';


$res=mysql_query("SELECT * FROM client_db WHERE user_id=".$_SESSION['user_id']);
$userRow=mysql_fetch_array($res);



if(is_array($_FILES)) {
	if(is_uploaded_file($_FILES['filUpload']['tmp_name'])) {
		$newname = $_SESSION['user_id'];
		
		$sourcePath = $_FILES['filUpload']['tmp_name'];
		$targetPath = "uploads/".$newname.$_FILES['filUpload']['name'];
		if(move_uploaded_file($sourcePath,$targetPath)) {
		?>
			<img src="<?php echo $targetPath; ?>" width="100px" height="100px" />
		<?php
		}
	}
}
?>                       