<?php

include_once '../include_login/DBController.php';

class Validate {
    function createToken() {

        // Create tokens

        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);



        $url = sprintf('%sreset.php?%s', ABS_URL, http_build_query([
            'selector' => $selector,
            'validator' => bin2hex($token)
        ]));

        // Token expiration
        $current_time = time();
        $expiration_time = $current_time + (24 * 60 * 60);  // for 1 day
        $hashed_token = hash('md5', $current_time . $current_time);


        /*$expires = new DateTime('NOW');
        $expires->add(new DateInterval('PT01H')); // 1 hour*/

        // Delete any existing tokens for this user


        // Insert reset token into database


    }
    function InsertToken($user_id, $selector, $token, $expiry_date) {
        $pdo = new DBController();
        $query = "INSERT INTO glemt_passord_pollett (bruker_id, velg_hash, pollett, utløpt_dato) values (:user_id, :selector, :token, :expiry_date)";
        $param_value_array = array(':user_id' => $user_id, ':selector' => $selector, ':token' => $token , ':expiry_date' => $expiry_date);
        $pdo->insert($query, $param_value_array);
    }

    function getTokenByID($user_id) {
        $pdo = new DBController();
        $query = "SELECT bruker_id, velg_hash, pollett, utløpt_dato FROM glemt_passord_pollett WHERE bruker_id = :user_id";
        $param_value_array = array(':user_id' => $user_id);
        $result = $pdo->runQuery($query, $param_value_array);
        return $result;
    }

    function getTokenBySelector($selector, $time) {
        $pdo = new DBController();
        $query = "SELECT * FROM glemt_passord_pollett WHERE velg_hash = :selector AND utløpt_dato >= :time";
        $param_value_array = array(':selector' => $selector, ':time' => $time);
        $result = $pdo->runQuery($query, $param_value_array);
        return $result;
    }

    function deleteToken($user_id){
        $pdo = new DBController();
        $query = "DELETE FROM glemt_passord_pollett WHERE bruker_id = :user_id";
        $param_value_array = array(':user_id' => $user_id);
        $pdo->update($query, $param_value_array);
    }
}