<?php
function uploadFile($file){

$target_dir = "uploads/";
$target_file = $target_dir . basename($file["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$target_file = $target_dir. uniqid() .".". $fileType;
// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  die( "Sorry, your file was not uploaded.");
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($file["tmp_name"], $target_file)) {
    return $target_file;
    //die( "The file ". htmlspecialchars( basename( $file["name"])). " has been uploaded.");
  } else {
    die ("Sorry, there was an error uploading your file.");
  }
}
}