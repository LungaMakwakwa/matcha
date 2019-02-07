<?php

require_once 'core/init.php';

$user = new User();

$user_id = $user->data()->user_id;
$username = $user->data()->username;

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
echo $target_file."";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        Session::flash('not_img', "File is not an image.");
        Redirect::to('display_picture.php');
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    Session::flash('already_exi', "Sorry, file already exists.");
    Redirect::to('display_picture.php');
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000000) {
    Session::flash('too_large', "Sorry, your file is too large.");
    Redirect::to('display_picture.php');
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    Session::flash('formet', "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    Redirect::to('display_picture.php');
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    Session::flash('not_upload', "Sorry, your file was not uploaded.");
    Redirect::to('display_picture.php');
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $image_to = $target_dir.$user_id.$username.rand(0,999).".jpeg";
    if ($uploaded_image = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $image_to)) {

        $display_picture = $image_to;

        $profile = $user->data()->profile;
        $profile = json_decode($profile);

        $profile->display_picture = $display_picture;
        $user->update(array('profile' => json_encode($profile)));

        echo "<br>".$target_dir.$user_id.$username.rand(0,999).".jpeg"."<br>";
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        Session::flash('upload', "You have succesfully Uploaded the image");
        Redirect::to("home.php");
    } else {
        Session::flash('up_error', "Sorry, there was an error uploading your file.");
        Redirect::to('display_picture.php');
        echo "Sorry, there was an error uploading your file.";
    }
}
?>