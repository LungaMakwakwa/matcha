<?php
        require_once 'core/init.php';
        

        //var_dump($_POST);
        $liker_id = $_POST['user'];
        $likee_id = $_POST['uid'];
        $button = $_POST['liked'];
        $stat = $_POST['stat'];


        $user = new User();
        if (Input::exists())
        {
            $db = DB::getInstance();
            //$imgid = Input::get('imgid');
            $users_id = $user->data()->user_id;
            $sql = "SELECT * FROM likes WHERE likee_id = $likee_id AND liker_id = $liker_id";
            echo $sql;
            var_dump ($sql);
            $liker = $db->query($sql);
            $numlikes = $liker->count();
            if ($numlikes === 0)
            {
                $db->insert('likes', array(
                    'likee_id' =>  $likee_id,
                    'liker_id' =>$user->data()->user_id,
                    'stat' =>  $stat,
                    'un/liked' =>  $button
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