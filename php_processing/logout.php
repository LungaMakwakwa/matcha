<?php
    require_once 'core/init.php';

    $user = new User();
    $db = DB::getInstance();
    if ($user->data()->status === "1")
    {
        $update = $db->query( "UPDATE users SET `status` = ? WHERE `user_id` = ?", array("status" => "0", "user_id"=>$user->data()->user_id));
        //Redirect::to('logged_in.php');
    }
    $user->logout();
    Redirect::to('index.php');
?>