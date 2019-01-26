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
                    'liker_stat' =>  $button,
                    'chat' => "{}"
                ));
                echo "like added";

                
                
                $user2 = new User($likee_id);
                $profile = $user2->data()->profile;
                $profile = json_decode($profile);
                
                
                var_dump($profile);
                $profile->fame_rating += 50;
                $profile->notification[] = $user->data()->username." Liked your profile";
                        
                // echo $fame_rating + 10; 
                $user2->update(array('profile' => json_encode($profile)), $user2->data()->user_id);

                $db->insert('history', array(
                    'user_id' =>  $likee_id,
                    'username_notif' =>$user->data()->username." Liked your profile",
                ));



            }
            if ($stat === 'Like back')
            {
                $sql = "UPDATE likes SET likee_stat = 1 WHERE likee_id = $likee_id AND liker_id = $liker_id OR likee_id = $liker_id AND liker_id = $likee_id";
                $db->query($sql);

                $user2 = new User($likee_id);
                $profile = $user2->data()->profile;
                $profile = json_decode($profile);
                
                var_dump($profile);
                $profile->fame_rating += 50;
                $profile->notification[] = $user->data()->username." Liked your profile back";
                        
                // echo $fame_rating + 10; 
                $user2->update(array('profile' => json_encode($profile)), $user2->data()->user_id);
                
            }

            if ($stat === 'unlike')
            {
                //echo "i am here";
                if ($likee_id === $user->data()->user_id)
                {
                    //echo "i should be here here";
                    $sql = "UPDATE likes SET likee_stat = 0 WHERE likee_id = $likee_id AND liker_id = $liker_id OR likee_id = $liker_id AND liker_id = $likee_id";
                    $db->query($sql);

                    $user2 = new User($liker_id);
                    $profile = $user2->data()->profile;
                    $profile = json_decode($profile);
                    
                    var_dump($profile);
                    $profile->fame_rating += 50;
                    $profile->notification[] = $user->data()->username." Unliked your profile";
                        
                // echo $fame_rating + 10; 
                $user2->update(array('profile' => json_encode($profile)), $user2->data()->user_id);
                }
                else if ($liker_id === $user->data()->user_id)
                {
                    //echo "but i am be here here";
                    $sql = "UPDATE likes SET liker_stat = 0 WHERE likee_id = $likee_id AND liker_id = $liker_id OR likee_id = $liker_id AND liker_id = $likee_id";
                    $db->query($sql);

                    $user2 = new User($likee_id);
                    $profile = $user2->data()->profile;
                    $profile = json_decode($profile);
                    
                    var_dump($profile);
                    $profile->fame_rating += 50;
                    $profile->notification[] = $user->data()->username." Unliked your profile";

                    // echo $fame_rating + 10; 
                    $user2->update(array('profile' => json_encode($profile)), $user2->data()->user_id);
                }
            }
        }
?>