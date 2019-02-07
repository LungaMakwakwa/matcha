<?php

    require_once "core/init.php";
    if(isset($_GET['activate']))
    {
        $activation_code = $_GET['activate'];
        //echo $activation_code."<br>";
        $db = DB::getInstance();
        $db->get("users",array('act_hash', '=', $activation_code));
        $atv_codes = $db->results();
        $atv_code = $atv_codes[0]->act_hash;
        $userid = $atv_codes[0]->user_id;
        if ($activation_code === $atv_code)
        {
            $sql = "UPDATE users SET active = 1 WHERE user_id = $userid";
            $update = $db->query($sql);
            echo ($sql);
        }
        Redirect::to('index.php');
        Session::flash('success_act', 'You have successfully activated your account! Now you can log in.');
    }
?>