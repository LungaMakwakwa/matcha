<?php
        require_once 'core/init.php';
        

        //var_dump($_POST);
        $liker_id = $_POST['user'];
        $likee_id = $_POST['uid'];
        $button = $_POST['liked'];
        $stat = $_POST['stat'];

        echo "stat = $stat";

        $user = new User();
        if (Input::exists())
        {
            $db = DB::getInstance();
            //$imgid = Input::get('imgid');
            $users_id = $user->data()->user_id;
            $sql = "SELECT * FROM likes WHERE likee_id = $likee_id AND liker_id = $liker_id OR likee_id = $liker_id AND liker_id = $likee_id";
            //echo $sql;
            //var_dump ($sql);
            $liker = $db->query($sql);
            //var_dump($liker);
            $numlikes = $liker->count();
            //echo $numlikes;
            if ($numlikes === 0)
            {
                $db->insert('likes', array(
                    'likee_id' =>  $likee_id,
                    'liker_id' =>$user->data()->user_id,
                    'liker_stat' =>  $button
                ));
                echo "like added";



                // $db->get("gallery",array('img_id', '=', $imgid));
                // $theid = $db->results();
                // $the_userid = $theid[0]->user_id;
                // $db->get("users",array('user_id', '=', $the_userid));
                // $emails = $db->results();
                // $email = $emails[0]->email;
                // $notify = $emails[0]->notification;
                // if ($notify === '1')
                // {
                //     $to = $email;
                //     $subject = "Camagru activation code";
                //     $txt = "You got a new Like";
                //     $mail = mail($to,$subject,$txt);
                //     if ($mail)
                //     {
                //         echo "Confirmation Email Sent.";
                //     }
                //     else
                //     {
                //         echo "Email invalid";
                //     }
                // }
            }
            if ($stat === 'Like back')
            {
                $sql = "UPDATE likes SET likee_stat = 1 WHERE likee_id = $likee_id AND liker_id = $liker_id OR likee_id = $liker_id AND liker_id = $likee_id";
                $db->query($sql);
            }

            if ($stat === 'unlike')
            {
                //echo "i am here";
                if ($likee_id === $user->data()->user_id)
                {
                    //echo "i should be here here";
                    $sql = "UPDATE likes SET likee_stat = 0 WHERE likee_id = $likee_id AND liker_id = $liker_id OR likee_id = $liker_id AND liker_id = $likee_id";
                    $db->query($sql);
                }
                else if ($liker_id === $user->data()->user_id)
                {
                    //echo "but i am be here here";
                    $sql = "UPDATE likes SET liker_stat = 0 WHERE likee_id = $likee_id AND liker_id = $liker_id OR likee_id = $liker_id AND liker_id = $likee_id";
                    $db->query($sql);
                }
            }
                
        //     else
        //     {
        //         $sql_del = "DELETE FROM likes WHERE img_id = $imgid AND user_id = $users_id";
        //         $unlike = $db->query($sql_del);
        //         echo "like removed";
        //     }
            
        }
        //$page = $_POST['page_no'];
        //Redirect::to("gallery.php?page=".$page);
?>