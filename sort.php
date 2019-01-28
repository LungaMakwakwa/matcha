<?php

    var_dump($_REQUEST);

    $age = $_REQUEST['age'];
    $loc = $_REQUEST['loc'];

    $user = new User();
    $profile = json_decode($user->data()->profile);
    if ($loc === 'None' && $age === 'None')
    {
        if ($profile_data->gender === "Male" && $profile_data->intrest_gender === "Female")
        {
        $sql = "SELECT * FROM `users` WHERE json_unquote(json_extract(`profile`, '$.gender')) = 'Female' AND json_unquote(json_extract(`profile`, '$.intrest_gender')) = 'Male' ORDER BY json_unquote(json_extract(`profile`, '$.fame_rating')) DESC";
        }

        if ($profile_data->gender === "Female" && $profile_data->intrest_gender === "Male")
        {
        $sql = "SELECT * FROM `users` WHERE json_unquote(json_extract(`profile`, '$.gender')) = 'Male' AND json_unquote(json_extract(`profile`, '$.intrest_gender')) = 'Female' ORDER BY json_unquote(json_extract(`profile`, '$.fame_rating')) DESC";
        }

        if ($profile_data->gender === "Male" && $profile_data->intrest_gender === "Male")
        {
        $sql = "SELECT * FROM `users` WHERE json_unquote(json_extract(`profile`, `$.gender`)) = Male AND json_unquote(json_extract(`profile`,`$.intrest_gender`)) = Male";
        }

        if ($profile_data->gender === "Female" && $profile_data->intrest_gender === "Female")
        {
        $sql = "SELECT * FROM `users` WHERE json_unquote(json_extract(`profile`, `$.gender`)) = Female AND json_unquote(json_extract(`profile`,`$.intrest_gender`)) = Female";
        }
    }

    else if ($loc !== 'None' && $age !== 'None')
    {
        if ($profile_data->gender === "Male" && $profile_data->intrest_gender === "Female")
        {
        $sql = "SELECT * FROM `users` WHERE json_unquote(json_extract(`profile`, '$.gender')) = 'Female' AND json_unquote(json_extract(`profile`, '$.intrest_gender')) = 'Male' ORDER BY json_unquote(json_extract(`profile`, '$.fame_rating')) DESC";
        }

        if ($profile_data->gender === "Female" && $profile_data->intrest_gender === "Male")
        {
        $sql = "SELECT * FROM `users` WHERE json_unquote(json_extract(`profile`, '$.gender')) = 'Male' AND json_unquote(json_extract(`profile`, '$.intrest_gender')) = 'Female' ORDER BY json_unquote(json_extract(`profile`, '$.fame_rating')) DESC";
        }

        if ($profile_data->gender === "Male" && $profile_data->intrest_gender === "Male")
        {
        $sql = "SELECT * FROM `users` WHERE json_unquote(json_extract(`profile`, `$.gender`)) = Male AND json_unquote(json_extract(`profile`,`$.intrest_gender`)) = Male";
        }

        if ($profile_data->gender === "Female" && $profile_data->intrest_gender === "Female")
        {
        $sql = "SELECT * FROM `users` WHERE json_unquote(json_extract(`profile`, `$.gender`)) = Female AND json_unquote(json_extract(`profile`,`$.intrest_gender`)) = Female";
        }
    }

    else if ($loc !== 'None' && $age === 'None')
    {
        if ($profile_data->gender === "Male" && $profile_data->intrest_gender === "Female")
        {
        $sql = "SELECT * FROM `users` WHERE json_unquote(json_extract(`profile`, '$.gender')) = 'Female' AND json_unquote(json_extract(`profile`, '$.intrest_gender')) = 'Male' ORDER BY json_unquote(json_extract(`profile`, '$.fame_rating')) DESC";
        }

        if ($profile_data->gender === "Female" && $profile_data->intrest_gender === "Male")
        {
        $sql = "SELECT * FROM `users` WHERE json_unquote(json_extract(`profile`, '$.gender')) = 'Male' AND json_unquote(json_extract(`profile`, '$.intrest_gender')) = 'Female' ORDER BY json_unquote(json_extract(`profile`, '$.fame_rating')) DESC";
        }

        if ($profile_data->gender === "Male" && $profile_data->intrest_gender === "Male")
        {
        $sql = "SELECT * FROM `users` WHERE json_unquote(json_extract(`profile`, `$.gender`)) = Male AND json_unquote(json_extract(`profile`,`$.intrest_gender`)) = Male";
        }

        if ($profile_data->gender === "Female" && $profile_data->intrest_gender === "Female")
        {
        $sql = "SELECT * FROM `users` WHERE json_unquote(json_extract(`profile`, `$.gender`)) = Female AND json_unquote(json_extract(`profile`,`$.intrest_gender`)) = Female";
        }
    }

    else if ($loc === 'None' && $age !== 'None')
    {
        if ($profile_data->gender === "Male" && $profile_data->intrest_gender === "Female")
        {
        $sql = "SELECT * FROM `users` WHERE json_unquote(json_extract(`profile`, '$.gender')) = 'Female' AND json_unquote(json_extract(`profile`, '$.intrest_gender')) = 'Male' ORDER BY json_unquote(json_extract(`profile`, '$.fame_rating')) DESC";
        }

        if ($profile_data->gender === "Female" && $profile_data->intrest_gender === "Male")
        {
        $sql = "SELECT * FROM `users` WHERE json_unquote(json_extract(`profile`, '$.gender')) = 'Male' AND json_unquote(json_extract(`profile`, '$.intrest_gender')) = 'Female' ORDER BY json_unquote(json_extract(`profile`, '$.fame_rating')) DESC";
        }

        if ($profile_data->gender === "Male" && $profile_data->intrest_gender === "Male")
        {
        $sql = "SELECT * FROM `users` WHERE json_unquote(json_extract(`profile`, `$.gender`)) = Male AND json_unquote(json_extract(`profile`,`$.intrest_gender`)) = Male";
        }

        if ($profile_data->gender === "Female" && $profile_data->intrest_gender === "Female")
        {
        $sql = "SELECT * FROM `users` WHERE json_unquote(json_extract(`profile`, `$.gender`)) = Female AND json_unquote(json_extract(`profile`,`$.intrest_gender`)) = Female";
        }
    }

    $db->query($sql);
    $images = $db->results();
    $num_images = $db->count();
    $i = 0;
    while ($i < $num_images)
    {
      $profile_data = json_decode($images[$i]->profile);
      echo '<div class="w3-container w3-card w3-white w3-round w3-margin"><br>';
      echo '<span class="w3-right w3-opacity">Picture</span>';
      echo '<h4 class="w3-center"><span class="dot" '.status($images[$i]->status).'></span>'.$images[$i]->first_name.' '.$images[$i]->last_name.'</h4>';
      echo '<hr class="w3-clear">';
      echo '<img src="'.$profile_data->display_picture.'" style="width:100%" class="w3-margin-bottom">';
      echo '<p>Age: '.age_cal($profile_data->DOB).'</p>';
      echo '<p>Gender: '.$profile_data->gender.'</p>';
      echo "<p><i class='fa fa-star fa-fw w3-margin-right w3-text-theme'></i>Fame Rate: $profile_data->fame_rating Points</p>";
      echo '<button type="button" data-status = "like" data-id="'.$images[$i]->user_id.'"  class="w3-button w3-theme-d1 w3-margin-bottom view_btn">View Profile</button> ';
      echo '</div>';
      $i++;
    }

    
?>