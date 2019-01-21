
<!-- Backend -->

<?php
    require_once 'core/init.php';

    if (Input::exists())
    {
        echo "check token"."<br>";
        echo Input::get('username2')."<br>";
        echo Input::get('password2')."<br>";
        echo Input::get('token2')."<br>";
        //if (Token::check(Input::get('token2')))
        //{
            echo "token checked";
            $validate = new Validate();
            $validation = $validate->check($_POST, array(
                'username2' => array('required' => true),
                'password2' => array('required' => true)
            ));

            if ($validation->passed())
            {
                $user = new User();
                $login = $user->login(Input::get('username2'), Input::get('password2'));
                $db = DB::getInstance();
                if($login)
                {
                    $act = $user->data()->active;
                    //echo $act;
                    if ($act === '1')
                    {
                        if ($user->data()->status !== "1")
                        {
                            $update = $db->query( "UPDATE users SET `status` = ? WHERE `user_id` = ?", array("status" => "1", "user_id"=>$user->data()->user_id));
                            
                        }
                        Redirect::to('logged_in.php');
                    }
                    else
                    {
                        echo "Please Activate your account";
                    }
                    // echo "successful";
                }
                else
                {
                    echo '<p> Sorry, logging in failed</p>';
                }
            }
            else
            {
                foreach($validation->errors() as $error)
                {
                    echo $error;
                }
            }
        //}
    }
?>