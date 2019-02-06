<?php
    require_once "core/init.php";

    var_dump ($_REQUEST);

    if ($_REQUEST['stat'] === "Block")
    {
        $user = new User();
        $user2 = new User($_REQUEST['uid']);
        
        $profile = $user->data()->profile;
        $profile = json_decode($profile);
        $profile->blocked[] = $_REQUEST['uid'];
        $user->update(array('profile' => json_encode($profile)), $user->data()->user_id);


        // var_dump($profile);
        $profile2 = $user2->data()->profile;
        $profile2 = json_decode($profile2);
        $profile2->blocker[] = $user->data()->user_id;
        $user2->update(array('profile' => json_encode($profile2)), $user2->data()->user_id);

        $d1 = $user2->data()->user_id;
        $d2 = $user->data()->user_id;
        $sql = "DELETE FROM likes WHERE likee_id = $d1 AND liker_id = $d2 OR likee_id = $d2 AND liker_id = $d1";
        $db->query($sql);
        $result = $db->result();

    }
    else if ($_REQUEST['stat'] === "Unblock")
    {
        $user = new User();
        $user2 = new User($_REQUEST['uid']);

        
        $profile = $user->data()->profile;
        $profile = json_decode($profile);
        $profile->blocked[] = 0;
        $user->update(array('profile' => json_encode($profile)), $user->data()->user_id);
        
        
        $profile2 = $user2->data()->profile;
        $profile2 = json_decode($profile2);
        $profile->blocker[] = 0;
        $user2->update(array('profile' => json_encode($profile)), $user2->data()->user_id);
        
        
    }
?>