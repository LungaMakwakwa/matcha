<script>
    function view(d)
    {
    //$(".view_btn").on('click', function(){

        // id = $(this).attr("data-id");
        //id = d.data-id;
        //alert(d.data-id);
        id = d.getAttribute("data-img");


        var hr = new XMLHttpRequest();
        var url = "views.php";
         hr.open("POST", url, true);
         hr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
         hr.onreadystatechange = function() {
            if(hr.readyState == 4 && hr.status == 200) {
                var return_data = hr.responseText;
                //alert(return_data);
                //console.log(return_data);
                window.location = "view_profile.php?user_id="+id
            }
        }
        ret = "user_id="+id;
        hr.send(ret);

    //});
    }
</script>

<?php

    require_once "core/init.php";

    ///var_dump($_REQUEST);


    $db = DB::getInstance();
    $user = new User();
    $profile_data = json_decode($user->data()->profile);

    // $age1 = $_REQUEST['age1'];
    // $age2 = $_REQUEST['age2'];
    // $loc = $_REQUEST['loc'];

    
    // $profile = json_decode($user->data()->profile);
    function status($status)
    {
        if ($status === "1")
        {
            return ('style="background-color:green;"');
        }
        else
        {
            return ('style="background-color:red;"');
        }
    }


    function sorts($gender, $pref)
    {   
        $age1 = $_REQUEST['age1'];
        $age2 = $_REQUEST['age2'];
        $loc = $_REQUEST['loc'];
        //var_dump($_REQUEST);
        if ($_REQUEST['fame'] === 'Descending')
        {
            $fame = 'DESC';
        }
        else if ($_REQUEST['fame'] === 'Ascending')
        {
            $fame = 'ASC';
        }


        $user = new User();
        $profile_data = json_decode($user->data()->profile);
        $blocked = implode(", ",$profile_data->blocked);
        $blocker = implode(", ",$profile_data->blocker);
        
        
        if ($loc === 'None' && $age1 === 'None' && $age1 === 'None')
        {
            if ($profile_data->gender === $gender && $profile_data->intrest_gender === $pref)
            {
                $sql = "SELECT * FROM `users` WHERE json_unquote(json_extract(`profile`, '$.gender')) = '$pref' AND json_unquote(json_extract(`profile`, '$.intrest_gender')) = '$gender' AND `user_id` NOT IN ($blocked) AND `user_id` NOT IN ($blocker) ORDER BY json_unquote(json_extract(`profile`, '$.fame_rating')) $fame";
                return $sql;
            }
        }

        else if ($loc === 'None' && $age1 !== 'None' && $age2 !== 'None' && $age1 < $age2)
        {
            if ($profile_data->gender === $gender && $profile_data->intrest_gender === $pref)
            {
                $sql = "SELECT * FROM `users` WHERE json_unquote(json_extract(`profile`, '$.age')) BETWEEN $age1 AND $age2 AND  json_unquote(json_extract(`profile`, '$.gender')) = '$pref' AND json_unquote(json_extract(`profile`, '$.intrest_gender')) = '$gender' AND `user_id` NOT IN ($blocked) AND `user_id` NOT IN ($blocker) ORDER BY json_unquote(json_extract(`profile`, '$.fame_rating')) $fame";
                return $sql;
            }
        }

        else if ($loc !== 'None' && $age1 === 'None' && $age2 === 'None')
        {
            if ($profile_data->gender === $gender && $profile_data->intrest_gender === $pref)
            {
                $sql = "SELECT * FROM `users` WHERE json_unquote(json_extract(`profile`, '$.gender')) = '$pref' AND json_unquote(json_extract(`profile`, '$.intrest_gender')) = '$gender' AND `user_id` NOT IN ($blocked) AND `user_id` NOT IN ($blocker) ORDER BY json_unquote(json_extract(`profile`, '$.fame_rating')) $fame";
                return $sql;
            }
        }

        else if ($loc !== 'None' && $age1 !== 'None' && $age2 !== 'None' && $age1 < $age2)
        {
            if ($profile_data->gender === $gender && $profile_data->intrest_gender === $pref)
            {
                $sql = "SELECT * FROM `users` WHERE json_unquote(json_extract(`profile`, '$.gender')) = '$pref' AND json_unquote(json_extract(`profile`, '$.intrest_gender')) = '$gender' AND `user_id` NOT IN ($blocked) AND `user_id` NOT IN ($blocker) ORDER BY json_unquote(json_extract(`profile`, '$.fame_rating')) $fame";
                return $sql;
            }
        }
    }

    $sql = sorts($profile_data->gender, $profile_data->intrest_gender);
    // echo $sql;
    // exit();
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
      echo '<p>Age: '.$profile_data->age.'</p>';
      echo '<p>Gender: '.$profile_data->gender.'</p>';
      echo "<p><i class='fa fa-star fa-fw w3-margin-right w3-text-theme'></i>Fame Rate: $profile_data->fame_rating Points</p>";
      echo '<button onclick = "view(this);" type="button" data-status = "like" data-img="'.$images[$i]->user_id.'"  class="w3-button w3-theme-d1 w3-margin-bottom view_btn">View Profile</button> ';
      echo '</div>';
      $i++;
    }
?>