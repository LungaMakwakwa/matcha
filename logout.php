<?php
    require_once 'core/init.php';

    $user = new User();
    $db = DB::getInstance();
    if ($user->data()->status === "1")
    {
        date_default_timezone_set("Africa/Johannesburg");
        $update = $db->query( "UPDATE users SET `status` = ? WHERE `user_id` = ?", array("status" => date("h:i:sa"), "user_id"=>$user->data()->user_id));
        //Redirect::to('logged_in.php');
    }
    $user->logout();
    Redirect::to('index.php');
?>