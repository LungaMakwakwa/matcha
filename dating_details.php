<?php
    require_once 'core/init.php';
    $user = new User();
    $profile = $user->data()->profile;
    $profile = json_decode($profile);

    function age_cal($dob)
    {
        $dateOfBirth = $dob;
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        return $diff->format('%y');
    }
    

    $gender = escape(INPUT::get('gender'));
    $sexual_p = escape(INPUT::get('sexual_p'));
    $dob = str_replace(',', ' ',escape(INPUT::get('checkin_date')));

    var_dump($_POST);
    
    $db = DB::getInstance();
    if ($gender && $gender !== ' ')
    {
        $profile->gender = $gender;
    }
    if ($sexual_p && $sexual_p !== ' ')
    {
        $profile->intrest_gender = $sexual_p; 
    }
    if ($dob)
    {
        $profile->DOB = $dob;
        $profile->age = age_cal($dob);

    }
    $user->update(array('profile' => json_encode($profile)));
    Session::flash('dating_Details', 'You have succesfully updated your Dating Details.');
    Redirect::to('update_profile.php');
?>