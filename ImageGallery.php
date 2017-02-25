<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user_id']))
{
	header("Location: index.php");
}
//$res=mysql_query("SELECT * FROM client_db WHERE user_id=".$_SESSION['user_id']);
//$userRow=mysql_fetch_array($res);*/



?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>File Gallery</title>
<link rel="stylesheet" href="css/ImageGallery.css" />
</head>

<body>
<h1 style="text-align: center; color: whitesmoke; background-color:blue;">Kyoto Engineering & Automation</h1>
<h2 style="color: red"><a href="logout.php?logout">signout</a></h2>
<div id="lightbox">
	
	<a href="ImageUpload.php" id="UpLink"></a>
        <h1>Image Bank</h1>

	<div class="full-content">
	  
	  	<div id="load" align="center">
	  	<img src="image/loading2.gif" width="28" height="28" align="middle"/> <span style="color:#dfdfdf;">Deleting...</span>
                </div>

		<?php
			$directory = "uploads/".$_SESSION['user_id'];
				$images = glob($directory . "*");

				//print each file name
				foreach($images as $image)
				{
					$inv_image_name = strrev($image);
					$pos_dot = strpos($inv_image_name,".");
					$pos_slash = strpos($inv_image_name,"/");
					$image_name_length = $pos_slash-$pos_dot;
					$image_name = strrev(substr($inv_image_name,$pos_dot+1,$image_name_length-1));

				echo "<div class=\"content-wrepper\">";
	
					echo "<div class=\"image-content\">";
					echo "<img src=".$image." data-large=".$image." width='230' height='155' />";
					echo "<div class=\"image_title\">";
                                        echo "<h5 class=\"title\">".$image_name."</h5>";
					echo "</div>";
					?>
					</div>
					<!-- End div: image-content -->
					
                                        <input type="button" value="" class="delete" id="<?php echo $image ?>">
					<a href="download.php?file=<?php echo $image ?>" class="download"></a>
    				<div class="clear"></div>
				
				</div>
				<!--End: Content-wrepper-->					

					<?php
				}
			?>

	</div>
</div>


<!-- PrefixFree -->
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/prefixfree.js" type="text/javascript"></script>
<script src="js/GallerySettings.js" type="application/javascript"></script>

<!--JS: Delete-->
<script type="text/javascript">
$(document).ready(function() {
$('#load').hide();
});

$(function() {
$(".delete").click(function() {
$('#load').fadeIn();
var commentContainer = $(this).parent();
var id = $(this).attr("id");
var string = 'id='+ id ;
	
$.ajax({
   type: "POST",
   url: "delete.php",
   data: string,
   cache: false,
   success: function(){
	commentContainer.slideUp('slow', function() {$(this).remove();});
	$('#load').fadeOut();
  }
   
 });

return false;
	});
});
</script>

</body>
</html>
