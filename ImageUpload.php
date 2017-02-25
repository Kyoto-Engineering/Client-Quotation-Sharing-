<?php 

session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user_id']))
{
	header("Location: index.php");
}

?>



<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> Upload File </title>
<link rel="stylesheet" href="css/ImageUpload.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>

<script type="text/javascript">

	function Displayimagepreview(input) {
		if (input.files && input.files[0]) {
		var filerdr = new FileReader();

		var FileName = input.files[0].name;
		var FileSize = Math.round(parseFloat(input.files[0].size)/1024);
		var Max_FileSize = 10240;

		var allowedExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp','pdf','zip','doc','xlsx','csv','ppt','rar','txt'];
		var fileExtension = FileName.split('.').pop().toLowerCase();
		//alert(fileExtension);
        var isValidFile = false;

        for(var index in allowedExtension) {
            if(fileExtension === allowedExtension[index]) {
                isValidFile = true; 
                break;
            }//End of if
        }//End of for

        //When file extension is not valid
        if(!isValidFile) {
            document.getElementById("image-details").innerHTML = 
			"<span style='color:red;'><b>This file extension is not valid</b></span>";
        }
        else{//When File Extension is valid

        	//If filesize greater than Maximum file Size(1MB)
        	if(FileSize>Max_FileSize){
        		document.getElementById("image-details").innerHTML = 
				"<span style='color:red;'><b>This file size is greater than 1GB</b></span>";
        	}
        	//If filesize is less than Maximum file size(1MB)
        	else{
        		filerdr.onload = function(e) {
					$('#image-preview').attr('src', e.target.result);
				}//End of function onload
				filerdr.readAsDataURL(input.files[0]);
				document.getElementById("submit-image").style.visibility="visible";

				document.getElementById("image-details").innerHTML = 
				"<span><b>Name: </b>"+FileName+"</span> <br> <span><b>Size: </b>"+FileSize+"KB</span>";
        	}
        }


		}//End of if
	}//End of function Displayimagepreview
</script>

<script type="text/javascript">
$(document).ready(function (e) {
	$("#ImageForm").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "upload.php",
			type: "POST",
			data: new FormData(this),
			contentType: false,
    	    cache: false,
			processData: false,
			success: function(data)
		    {
				document.getElementById("UploadSuccess").innerHTML="<span><b>The File has been uploaded</b></span>";

				window.setTimeout(function() {
				    window.location.href = 'ImageGallery.php';
				}, 1000);
		    },
		  	error: function()
	    	{
	    	} 	        
	   });
	}));
});
</script>


</head>
<body>
<h1 style="text-align: center; color: whitesmoke; background-color:blue;">Kyoto Engineering & Automation</h1>
<div class="content-wrepper">

	<div class="UploaderHeader">
		<a href="ImageGallery.php" id="LinkGallery"></a>
		<h2>Image Bank</h2>
	</div>

	<form id="ImageForm" method="post" enctype="multipart/form-data" action="ImageUpload.php">
		<div id="UploadSuccess"></div>
		<input type="file" name="filUpload" id="filUpload" onchange="Displayimagepreview(this)" />
		<input type="submit" id="submit-image" value="Upload File" name="submit" style="visibility: hidden;">
	</form>

	<div class="preview-details">
		<img id="image-preview" alt="Image Preview" width="300" height="225" />
		<div id="image-details"></div>
	</div>
</div>

</body>
</html>