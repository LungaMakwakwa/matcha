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

?>