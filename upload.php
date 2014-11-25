<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Input File Upload</title>
</head>
<body>
<?php
$target_dir = "in/";
$fileToUpload = $_FILES["fileToUpload"]["name"];
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
$FileType2 = $_FILES['fileToUpload']['type'];
if(isset($_POST["submit"])) {
	if ($_FILES['fileToUpload']['type'] == 'text/plain') // this file is TXT
	{
        echo "File is a text<br>";
        $uploadOk = 1;
    } 
	else {
        echo "File $fileToUpload is of type $FileType, $FileType2, this is not a plain text.<br>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?> 
</body>
</html>