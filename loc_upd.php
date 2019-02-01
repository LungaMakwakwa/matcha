<?php
    require_once "core/init.php";

    $loc = $_POST['opt'];
    $user = new User();
    $location = json_decode($user->data()->profile);
    $location->location = $loc[0];

    $user->update(array('profile' => json_encode($location)));

    Session::flash('loc', 'You have successfully updated your location');
    Redirect::to('update_profile.php');


?>