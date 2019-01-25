<?php
    require_once "core/init.php";

    var_dump ($_REQUEST);

    if ($_REQUEST['stat'] === "Block")
    {
        $user = new User();
        $profile = $user->data()->profile;
        $profile = json_decode($profile);
        
        
        var_dump($profile);
        $profile->blocked = $_REQUEST['uid'];
        //$profile->notification[] = $user->data()->username." Liked your profile";

        // echo $fame_rating + 10; 
        $user->update(array('profile' => json_encode($profile)), $user->data()->user_id);
    }
    else if ($_REQUEST['stat'] === "Unblock")
    {
        $user = new User();
        $profile = $user->data()->profile;
        $profile = json_decode($profile);
        
        
        var_dump($profile);
        $profile->blocked = 0;
        //$profile->notification[] = $user->data()->username." Liked your profile";

        // echo $fame_rating + 10; 
        $user->update(array('profile' => json_encode($profile)), $user->data()->user_id);
        
    }
?>