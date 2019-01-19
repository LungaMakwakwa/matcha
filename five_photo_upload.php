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
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $image_to = $target_dir.$user_id.$username.rand(0,999).".jpeg";
    if ($uploaded_image = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $image_to)) {

        $db = DB::getInstance();
        
        $sql = "SELECT * FROM gallery WHERE user_id = $user_id";
        $db->query($sql);
        $result = $db->results();
        $num_res = $db->count();
        if ($num_res < 5)
        {
            $db->insert('gallery', array(
                'img_name' => $image_to,
                'user_id' => $user_id));
        }
        else
        {
            echo "you have reached your limit";
        }


    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>