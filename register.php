<!-- Back end -->
<?php

    require_once 'core/init.php';


    function age_cal($dob)
        {
            $dateOfBirth = $dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dateOfBirth), date_create($today));
            return $diff->format('%y');
        }


    //var_dump(Token::check(Input::get('token')));

    if (Input::exists())
    {
        echo ("input token checked");
        if (Token::check(Input::get('token')))
        {
            echo ("token checked");
            $validate = new Validate();
            $validation = $validate->check($_POST, array(
                'username' => array(
                    'required' => true,
                    'min' => 2,
                    'max' => 20,
                    'unique' => 'users'
                ),
                'password' => array(
                    'required' => true,
                    'min' => 6
                ),
                're-password' => array(
                    'required' => true,
                    'matches' => 'password'
                ),
                'email' => array(
                    'required' => true,
                    'unique' => 'users'
                )
            ));

            if($validation->passed())
            { 
                echo Input::get('re_password')."<br>";
                
                $user = new User();
                $email = filter_var(Input::get('email'), FILTER_VALIDATE_EMAIL);
                $json = json_encode(array(
                    "age" => age_cal(str_replace(",", "", Input::get('checkin_date'))),
                    "Bio" => "Status: Feeling Blue",
                    "DOB" => str_replace(",", "", Input::get('checkin_date')),    
                    "intrest_gender" => Input::get('intrest_gender'),
                    "gender" => Input::get('gender'),
                    "display_picture" => "Avatar.png",
                    "status" => "0",
                    "location" => Input::get('location'),
                    "fame_rating" => "0",
                    "blocked" => array("0", "0"),
                    "blocker" => array("0", "0"),
                    "intrests" => array("No intrest")
                ));
                echo $json;

                if ($email)
                {
                    try 
                    {
                        $user->create(array(
                            'first_name' => Input::get('first_name'),
                            'last_name' => Input::get('last_name'),
                            'username' => Input::get('username'),
                            'password' => Hash::make(Input::get('password')),
                            'email' => Input::get('email'),
                            'act_hash' => md5(Input::get('email')),
                            'profile' =>  $json
                        ));
                        
                        Session::flash('Con_email', 'Activation Acount Email Sent');
                        Redirect::to('index.php');
                        
                        exit();
                    // Redirect
                    }

                    catch (Exception $e)
                    {
                        die ($e->getMessage());
                    }
                }
                else
                {
                    
                    echo "email invalid Please <a href = register.php>Register again</a>";
                    exit();
                }
            }
            else
            {
                //print_r($validation->errors());
                foreach ($validation->errors() as $error)
                {
                    echo $error;
                }
            }
        }

        /////////////////////////
        //      EMAIL!!!
        ////////////////////////

        $username = Input::get('username');
        $email_code = md5(Input::get('email'));
        $email = Input::get('email');
        $to = trim(Input::get('email'));
        $subject = "Camagru activation code";
        $txt = "Hi $username<br>Click link to activate account.<br>http://127.0.0.1:8080/camagru/activate.php?activate=$email_code&email=$email";
        $mail = mail($to,$subject,$txt);
        if ($mail)
        {
            Session::flash('email_act', 'Account activation email sent');
            Redirect::to('index.php');
        }
        else
        {
            Session::flash('invalid', 'invalid email address');
            Redirect::to('index.php');
        }
        //echo $txt;
    }
?>
