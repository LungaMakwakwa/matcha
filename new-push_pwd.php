<?php
  require_once 'core/init.php';

    $db = DB::getInstance();
    if(isset($_GET['email']))
    {
        $password = Input::get('password');
        $password_again = Input::get('password_again');
        if (strcmp($password, $password_again) === 0)
        {
            $password_harsh = Hash::make(Input::get('password'));
            $code = $_GET['email'];
            $sql1 = "SELECT * FROM users WHERE act_hash = '$code'";
            $db->query($sql1);
            $id = $db->first();
        
            $sql = "UPDATE users SET `password` = $password_harsh WHERE `user_id` = '$id->user_id'";
            $update = $db->query($sql);
            var_dump($update);
            $count = $db->count();
            //var_dump($sql);
            echo $count;
            if ($count == 1)
            {
                Session::flash('Reset_done', 'Your password has been updated.');
                Redirect::to('index.php');
            }
        }
        else
        {
            
            Session::flash('Reset_not_done', 'Sorry passwords dont match.');
            Redirect::to('index.php');
        }
    }

?>