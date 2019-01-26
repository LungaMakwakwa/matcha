<?php

    require_once 'core/init.php';
  
    $user = new User();
    $db = DB::getInstance();
    //echo ($_GET['user_id']);
    $user_id = $_REQUEST['user_id'];
    $userid = $user->data()->user_id;

    $test = new User($user_id);
  
    //var_dump($test->data()->profile);
    // exit();
    $sql = "SELECT * FROM fame_rate WHERE viewer_id = $userid AND viewed_id = $user_id";
    $db->query($sql);
    $count = $db->count();

    
    if ($count === 0)
    {
      $db->insert('fame_rate', array(
        'viewer_id' => $userid,
        'viewed_id' => $user_id));
      
        $profile = $test->data()->profile;
        $profile = json_decode($profile);
      
        $profile->fame_rating += 10;
        $profile->notification[] = $user->data()->username." Viewed your profile";
        //var_dump ($profile);        
        // echo $fame_rating + 10; 
        $test->update(array('profile' => json_encode($profile)), $test->data()->user_id);

        $db->insert('history', array(
            'user_id' =>  $test->data()->user_id,
            'username_notif' =>$user->data()->username." Viewed your profile",
        ));

      
      
    }
    else
    {
        $profile = $test->data()->profile;
        // var_dump ($profile);
        $profile = json_decode($profile);
        $profile->fame_rating += 10; 
        $profile->notification[] = $user->data()->username." Viewed your profile";
        //var_dump ($profile);
        $test->update(array('profile' => json_encode($profile)), $test->data()->user_id);

        $db->insert('history', array(
            'user_id' =>  $test->data()->user_id,
            'username_notif' =>$user->data()->username." Viewed your profile",
        ));
    }
    //Redirect::to("view_profile.php?user=".$user_id);
    

?>