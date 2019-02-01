<?php
    require_once 'core/init.php';
	//var_dump($_REQUEST);
    //exit(); */
	$user = new user;
	$db = DB::getInstance();
	$profile = json_decode($user->data()->profile);

	if(input::exists('request'))
	{
		if (input::get('getnotes'))
		{
			if (isset($profile->notification))
			{
                echo json_encode($profile->notification);
				
			}else{
				echo "0";
			}
		}
		else if (input::get('addnotes'))
		{
			$user2 = new user(input::get('name'));
			$profile2 = json_decode($user2->data()->profile);
			if ($profile2->notification){
				if (!in_array($user->data()->username. " " .input::get('addnotes'), $profile2->notification)){
					$profile2->notification[] = $user->data()->username. " " .input::get('addnotes');
					$user2->update(array('profile' => json_encode($profile2)), $user2->data()->user_id);
				}
			}
			else {
				$profile2->notification[] = $user->data()->username. " " .input::get('addnotes');
					$user2->update(array('profile' => json_encode($profile2)), $user2->data()->user_id);
			}
			echo 1;			
		}
		else if(input::get('removenotes'))
		{
			unset($profile->notification);
			$user->update(array('profile' => json_encode($profile)));
		}
	}
?>