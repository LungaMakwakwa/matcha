<?php
    require_once 'core/init.php';

    echo $bio = $_REQUEST['bio'];
    $user = new User();
    $profile = json_decode($user->data()->profile);
    $profile->Bio = $bio;
    $user->update(array('profile' => json_encode($profile)));
?>