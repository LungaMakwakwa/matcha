<?php

  require_once 'core/init.php';
  $user = new User();

  $user_id = $user->data()->user_id;
  $db = DB::getInstance();
  $intrests = input::get('test');
  var_dump($intrests);
  $profile = $user->data()->profile;
  $profile = json_decode($profile);

  $profile->intrests = $intrests; 
  $user->update(array('profile' => json_encode($profile)));

  $N = count($intrests);
  // for($i=0; $i < $N; $i++)
  // {
  //   //$user->update(array('profile' => ))
  //   echo($intrests[$i] . " ");
  // }

    // $aDoor = $_POST['test'];
    // if(empty($aDoor)) 
    // {
    //   echo("You didn't select any buildings.");
    // } 
    // else
    // {
    //   $N = count($aDoor);
  
    //   echo("You selected $N door(s): ");
    //   for($i=0; $i < $N; $i++)
    //   {
    //     echo($aDoor[$i] . " ");
    //   }
    // }

?>