<?php

require_once 'core/init.php';

$db = DB::getInstance();
$user = new User();
$user_id = $user->data()->user_id;

/* require_once 'core/init.php';
$db = DB::getInstance();*/
//var_dump($_REQUEST);
switch ($_REQUEST['action']) {


    case 'getUsers':
        try {
            // $con = new PDO("mysql:host=localhost", "root", "123456");
            // $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // $con->query("USE matcha");
            $sql1 = ("SELECT `username`,`user_id` FROM `users` JOIN `likes` ON `liker_id`=`user_id` WHERE `likee_id` = $user_id AND `liker_stat` = 1 AND `likee_stat` = 1");
           // echo "sql1 = $sql1";
            
            

            // $stmt->bindParam(':user', $_SESSION['id']);
            // $stmt->execute();
            // $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // $con->query("USE matcha");
            $sql2 = ("SELECT `username`,`user_id` FROM `users` JOIN `likes` ON `likee_id`=`user_id` WHERE `liker_id` = $user_id AND liker_stat = 1 AND `likee_stat` = 1");
            //echo "sql2 = $sql2";
            // $stmt->bindParam(':user', $_SESSION['id']);
            // $stmt->execute();
            // $ret = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // $fin = array_merge($ret, $info);
            // foreach ($fin as $key => $value) {
            //     echo '<p onclick="showPart(this);" id='.$value["username"].' data-pid='.$value["user_id"].' class="uname">'.$value["username"].'</p><br>';
            // } 
            // $con = null;
        } catch (PDOException $e) {
            print "Error : " . $e->getMessage() . "<br/>";
            die();
        }
        break;



        case 'sendMessage':
        //$newmsg = $_REQUEST['chat'].$_SESSION['username'] .': '. $_REQUEST['message'];
        // var_dump($_REQUEST);
        $userid = $_REQUEST['user'];
        //echo "LOOOK $userid";
        
        //echo "userid = $userid";
        //echo "user_id = $user_id";
    
        $newmsg = explode('<br>', $newmsg);
        $new = json_encode($newmsg);
        //var_dump($new); 
        // $con = new PDO("mysql:host=localhost", "root", "123456");
        // $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // $con->query("USE matcha");
        $sql = ("UPDATE `likes` SET `chat` = $new WHERE `liker_id`= $user_id AND `likee_id`= $userid OR `likee_id`= $user_id AND `liker_id`= $userid");
        $db->query($sql);
        //echo "sql3 = $sql3";
        // $stmt->bindParam(':id', $_SESSION['id']);
        // $stmt->bindParam(':usid', $_REQUEST['user']);
        // $stmt->bindValue(':chat', $new);
        // $stmt->execute();
        //$con = null;
         //echo 1; 
        break;


        case 'getMessages':
        $userid = $_REQUEST['user'];
        $sql = ("SELECT * FROM `likes` WHERE `liker_id`= $user_id AND `likee_id`= $userid OR `likee_id`= $user_id AND `liker_id`= $userid");
        $db->query($sql);
        $info = $db->first();
        $chat = '';
        echo json_encode($info);
       
        //echo $info->chat;
        //exit();
        //var_dump($info);
        // foreach ($info->chat as $val) {
        //     $chat .= '<div class="single-message">
        //     <strong>' . $key->user . ': </strong><br /> <p>' . $key->message . '</p>
        //     <br/>
        //     <span>' . date('h:i a', strtotime($key->date)) . '</span>
        //     </div>
        //     <div class="clear"></div>
        //     ';
        // }
       // echo $chat;
        break; 
}


?>