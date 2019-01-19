<?php
    require_once 'core/init.php';
    $user = new User();
    $user_id = $user->data()->user_id;
    $gender = escape(INPUT::get('gender'));
    $sexual_p = escape(INPUT::get('sexual_p'));
    $dob = str_replace(',', ' ',escape(INPUT::get('checkin_date')));
    //$email = escape(INPUT::get('email'));
    
    $db = DB::getInstance();
    if ($gender && $gender !== ' ')
    {
        $profile = $user->data()->profile;
        $profile = json_decode($profile);

        $profile->gender = $gender; 
        $user->update(array('profile' => json_encode($profile)));
    }
    if ($sexual_p && $sexual_p !== ' ')
    {
        $profile = $user->data()->profile;
        $profile = json_decode($profile);

        $profile->intrest_gender = $sexual_p; 
        $user->update(array('profile' => json_encode($profile)));
    }
    if ($dob)
    {
        $profile = $user->data()->profile;
        $profile = json_decode($profile);
        $profile->DOB = $dob; 
        $user->update(array('profile' => json_encode($profile)));
        //echo ($dob);
    }
    Session::flash('dating_Details', 'You have succesfully updated your Dating Details.');
    Redirect::to('update_profile.php');
?>