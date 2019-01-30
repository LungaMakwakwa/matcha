<?php
    require_once 'core/init.php';
    $email = Input::get('re_email');
    echo ($email);
    $db = DB::getInstance();
    $db->get("users",array('email', '=', $email));
    $emails = $db->results();
    $sql = "SELECT * FROM users WHERE 'email' = $email";
    $db->query($sql);
    $code = $db->first();
    var_dump($code->act_hash);

    // if ($db->count() === 0)
    // {
    //     echo "Error email doesnt Exist";
    // }

    if ($db->count() > 0)
    {
        $avail_email = $emails[0]->email;
        $user_id = $emails[0]->user_id;
        if ($email === $avail_email)
        {
            $to = trim(Input::get('re_email'));
            $subject = "Matcha Password Reset";
            $txt = "Hi <br>Click link to Reset Password.<br><a>http://127.0.0.1:8080/matcha/index.php?email=$code->act_hash</a>";
            $mail = mail($to,$subject,$txt);
            if ($mail)
            {
                Session::flash('re-pwd', 'Reset Password Email Sent.');
                Redirect::to('index.php');
            }
        }
        else
        {
            Session::flash('no-re-pwd', 'Email Address not found please register.');
            Redirect::to('index.php');
        }
    }
?>
