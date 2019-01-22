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
        // echo $fame_rating + 10; 
        $test->update(array('profile' => json_encode($profile)), $test->data()->user_id);
      
      
    }
    else
    {
        $profile = $test->data()->profile;
        // var_dump ($profile);
        $profile = json_decode($profile);
        $profile->fame_rating += 10; 
        $test->update(array('profile' => json_encode($profile)), $test->data()->user_id);
    }
    //Redirect::to("view_profile.php?user=".$user_id);
    

?>