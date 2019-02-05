<?php

require_once 'core/init.php';

$db = DB::getInstance();
$user = new User();
$user_id = $user->data()->user_id;
$username = $user->data()->username;


switch ($_REQUEST['action']) {


    case 'getUsers':
        try {

            $sql1 = ("SELECT `username`,`user_id` FROM `users` JOIN `likes` ON `liker_id`=`user_id` WHERE `likee_id` = $user_id AND `liker_stat` = 1 AND `likee_stat` = 1");

            $sql2 = ("SELECT `username`,`user_id` FROM `users` JOIN `likes` ON `likee_id`=`user_id` WHERE `liker_id` = $user_id AND liker_stat = 1 AND `likee_stat` = 1");
            
        } catch (PDOException $e) {
            print "Error : " . $e->getMessage() . "<br/>";
            die();
        }
        break;



        case 'sendMessage':
        $newmsg = $_REQUEST['chat'].$username .': '. $_REQUEST['message'];
        
        $userid = $_REQUEST['user'];

        $newmsg = explode('<br>', $newmsg);
        $new = json_encode($newmsg);
        $sql = ("UPDATE `likes` SET `chat` = '$new' WHERE `liker_id`= $user_id AND `likee_id`= $userid OR `likee_id`= $user_id AND `liker_id`= $userid");
        $db->query($sql);

        $user2 = new User($userid);
        $profile = $user2->data()->profile;
        $profile = json_decode($profile);
        $profile->notification[] = $user->data()->username." Sent you a message";
        $user2->update(array('profile' => json_encode($profile)), $user2->data()->user_id);
         echo 1; 
        break;


        case 'getMessages':
        $userid = $_REQUEST['user'];
        $sql = ("SELECT * FROM `likes` WHERE `liker_id`= $user_id AND `likee_id`= $userid OR `likee_id`= $user_id AND `liker_id`= $userid");
        $db->query($sql);
        $info = $db->first();
        $chat = '';
        echo json_encode($info);       
        break; 
}


?>