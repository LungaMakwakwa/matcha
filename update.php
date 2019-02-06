<?php
    require_once 'core/init.php';
    $user = new User();
    $user_id = $user->data()->user_id;

    $name = escape(INPUT::get('name'));
    
    $last_name = escape(INPUT::get('last_name'));

    $username = escape(INPUT::get('username'));

    $email = escape(INPUT::get('email'));

    $db = DB::getInstance();
    if ($name)
    {
        $update = $db->query( "UPDATE users SET `first_name` = ? WHERE `user_id` = ?", array("name"=>$name, "user_id"=>$user_id));
    }
    if ($last_name)
    {
        $update = $db->query( "UPDATE users SET `last_name` = ? WHERE `user_id` = ?", array("last_name"=>$last_name, "user_id"=>$user_id));
    }
    if ($username)
    {
        $update = $db->query( "UPDATE users SET username = ? WHERE `user_id` = ?", array("username"=>$username, "user_id"=>$user_id));

    }
    if ($email)
    {
        $update = $db->query( "UPDATE users SET email = ? WHERE `user_id` = ?", array("email"=>$email, "user_id"=>$user_id));
    }
    Session::flash('Details', 'You have succesfully updated your Personal Details.');
    Redirect::to('update_profile.php');
?>