<?php
    include "database.php";

    try {
        $dbh = new PDO("mysql:host=$DB_DNS", $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $dbh->exec("CREATE DATABASE IF NOT EXISTS matcha;")
        or die(print_r($dbh->errorInfo(), true));
        $dbh->exec("CREATE TABLE `matcha`.`users`(
            `user_id` INT(11) NOT NULL AUTO_INCREMENT,
            `first_name` VARCHAR(255) NOT NULL,
            `last_name` VARCHAR(255) NOT NULL,
            `username` VARCHAR(255) NOT NULL,
            `password` VARCHAR(255) NOT NULL,
            `email` VARCHAR(255) NOT NULL,
            `active` INT(255) NOT NULL DEFAULT 0,
            `notification` INT(255) NOT NULL DEFAULT 1,
            `act_hash` VARCHAR(255) NOT NULL,
            `profile` JSON NOT NULL,
            `status` VARCHAR(255) NOT NULL DEFAULT 0,
            PRIMARY KEY(`user_id`)
        )");

        $dbh->exec('INSERT INTO `matcha`.`users` (`user_id`, `first_name`, `last_name`, `username`, `password`, `email`, `active`, `notification`, `act_hash`, `profile`, `status`) VALUES
        (1, "Cindy", "Kimberly", "Cindy_k", "b5f95967cb5e02d7927b182b02ddca4dbf469d69e9932d2c653f5d7a7ad1eefd", "cindy_k@mailinator.com", 1, 1, "d6d6434199f4cdbbd26e701913ad5611", "{\"Bio\": \"yes\", \"DOB\": \"21 July  1993\", \"age\": \"25\", \"gender\": \"Female\", \"status\": \"0\", \"blocked\": [\"0\", \"0\"], \"blocker\": [\"0\", \"0\"], \"intrests\": [\"Games\", \"Design\", \"Fashion\"], \"location\": \"Johannesburg, 2000, South Africa\", \"fame_rating\": \"0\", \"intrest_gender\": \"Male\", \"display_picture\": \"images/1Cindy_k236.jpeg\"}", "05:44:44pm"),
        (2, "Chris", "Paul", "Chris", "b5f95967cb5e02d7927b182b02ddca4dbf469d69e9932d2c653f5d7a7ad1eefd", "chris_paul@mailinator.com", 1, 1, "70befd61faad8f51af8036f7d5539904", "{\"Bio\": \"Hoop\", \"DOB\": \"1 August 1990\", \"age\": \"28\", \"gender\": \"Male\", \"status\": \"0\", \"blocked\": [\"0\", \"0\"], \"blocker\": [\"0\", \"0\"], \"intrests\": [\"Fashion\", \"Photography\", \"Movies\", \"Sports\"], \"location\": \"Johannesburg, 2000, South Africa\", \"fame_rating\": 10, \"notification\": [\"Meagan Viewed your profile\"], \"intrest_gender\": \"Female\", \"display_picture\": \"images/2Chris45.jpeg\"}", "05:25:32pm"),
        (3, "Meagan", "Good", "Meagan", "b5f95967cb5e02d7927b182b02ddca4dbf469d69e9932d2c653f5d7a7ad1eefd", "meagan_good@mailinator.com", 1, 1, "6e06899088bce29f448d62603b73d1cf", "{\"Bio\": \"Yes i am single\", \"DOB\": \"29 November 1995\", \"age\": \"23\", \"gender\": \"Female\", \"status\": \"0\", \"blocked\": [\"0\", \"0\"], \"blocker\": [\"0\", \"0\"], \"intrests\": [\"No intrest\"], \"location\": \"Johannesburg, 2000, South Africa\", \"fame_rating\": 10, \"notification\": [\"Shane Viewed your profile\"], \"intrest_gender\": \"Male\", \"display_picture\": \"images/3Meagan989.jpeg\"}", "05:42:54pm"),
        (4, "Angela", "Green", "Angela", "b5f95967cb5e02d7927b182b02ddca4dbf469d69e9932d2c653f5d7a7ad1eefd", "angela@mailinator.com", 1, 1, "2e5dace11cc82e17725dac58fd98ce9a", "{\"Bio\": \"Status: Feeling Blue\", \"DOB\": \"20 November 1980\", \"age\": \"38\", \"gender\": \"Female\", \"status\": \"0\", \"blocked\": [\"0\", \"0\"], \"blocker\": [\"0\", \"0\"], \"intrests\": [\"No intrest\"], \"location\": \"Johannesburg, 2000, South Africa\", \"fame_rating\": \"0\", \"intrest_gender\": \"Female\", \"display_picture\": \"images/4Angela5.jpeg\"}", "05:33:19pm"),
        (5, "Terry", "Pheto", "Terry", "b5f95967cb5e02d7927b182b02ddca4dbf469d69e9932d2c653f5d7a7ad1eefd", "terry_p@mailinator.com", 1, 1, "1e45d74cf47f2afd564155f0e63c3bf3", "{\"Bio\": \"Status: Feeling Blue\", \"DOB\": \"4 December 1995\", \"age\": \"23\", \"gender\": \"Female\", \"status\": \"0\", \"blocked\": [\"0\", \"0\"], \"blocker\": [\"0\", \"0\"], \"intrests\": [\"No intrest\"], \"location\": \"Johannesburg, 2000, South Africa\", \"fame_rating\": \"0\", \"intrest_gender\": \"Male\", \"display_picture\": \"images/5Terry598.jpeg\"}", "05:35:41pm"),
        (6, "Priddy", "Ugly", "Priddy", "b5f95967cb5e02d7927b182b02ddca4dbf469d69e9932d2c653f5d7a7ad1eefd", "priddy@mailinator.com", 1, 1, "e1e988df1e985eeb18d3d201d4cab325", "{\"Bio\": \"Status: Feeling Blue\", \"DOB\": \"14 June 1993\", \"age\": \"25\", \"gender\": \"Male\", \"status\": \"0\", \"blocked\": [\"0\", \"0\"], \"blocker\": [\"0\", \"0\"], \"intrests\": [\"No intrest\"], \"location\": \"Johannesburg, 2000, South Africa\", \"fame_rating\": \"0\", \"intrest_gender\": \"Female\", \"display_picture\": \"images/6Priddy510.jpeg\"}", "05:40:16pm"),
        (7, "Shane", "Eagle", "Shane", "b5f95967cb5e02d7927b182b02ddca4dbf469d69e9932d2c653f5d7a7ad1eefd", "shane@mailinator.com", 1, 1, "dc33bda25980a5f96c1f79c2366518cf", "{\"Bio\": \"Status: Feeling Blue\", \"DOB\": \"19 June 1996\", \"age\": \"22\", \"gender\": \"Male\", \"status\": \"0\", \"blocked\": [\"0\", \"0\"], \"blocker\": [\"0\", \"0\"], \"intrests\": [\"No intrest\"], \"location\": \"Johannesburg, 2000, South Africa\", \"fame_rating\": \"0\", \"intrest_gender\": \"Female\", \"display_picture\": \"images/7Shane457.jpeg\"}", "1")');


        $dbh->exec("CREATE TABLE `matcha`.`likes`(
            `u_id` INT(11) NOT NULL AUTO_INCREMENT,
            `likee_id` INT(255) NOT NULL,
            `liker_id` INT(255) NOT NULL,
            `likee_stat` INT(255) NOT NULL DEFAULT 0,
            `liker_stat` INT(255) NOT NULL DEFAULT 0,
            `chat` JSON NOT NULL,
            PRIMARY KEY(`u_id`)  
        )");
        $dbh->exec("CREATE TABLE `matcha`.`history`(
            `h_id` INT(255) NOT NULL AUTO_INCREMENT,
            `user_id` INT(255) NOT NULL,
            `username_notif` TEXT NOT NULL,
            PRIMARY KEY(`h_id`)
        )");
        $dbh->exec("CREATE TABLE `matcha`.`gallery`(
            `img_id` INT(255) NOT NULL AUTO_INCREMENT,
            `img_name` VARCHAR(255) NOT NULL,
            `user_id` INT(255) NOT NULL,
            PRIMARY KEY(`img_id`)
        )");

        $dbh->exec("INSERT INTO `matcha`.`gallery` (`img_id`, `img_name`, `user_id`) VALUES
        (2, 'images/1Maureen199.jpeg', 1),
        (3, 'images/1Maureen959.jpeg', 1),
        (4, 'images/2Chris212.jpeg', 2),
        (5, 'images/3Meagan419.jpeg', 3),
        (6, 'images/3Meagan379.jpeg', 3),
        (7, 'images/4Angela967.jpeg', 4),
        (8, 'images/5Terry784.jpeg', 5),
        (9, 'images/6Priddy980.jpeg', 6),
        (10, 'images/7Shane991.jpeg', 7)");

        $dbh->exec("CREATE TABLE `matcha`.`fame_rate`(
            `u_id` INT(255) NOT NULL AUTO_INCREMENT,
            `viewer_id` INT(255) NOT NULL,
            `viewee_id` INT(255) NOT NULL,
            PRIMARY KEY(`u_id`)
        )");
    } catch (PDOException $e) {
        die("DB ERROR: ". $e->getMessage());
    }

?>