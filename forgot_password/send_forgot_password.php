<?php
require_once "../include_login/DBController.php";
require_once '../mail/Mail.php';
require_once '../include_login/Util.php';
require_once 'Validate.php';

if (!empty($_POST['email-forgot-input'])) {
    // get emails from database
    $email = $_POST['email-forgot-input'];
    $pdo = new DBController();
    $query = "SELECT id, epost FROM brukere WHERE epost = :email LIMIT 1";
    $param_value_array = array(':email' => $email);
    $result = $pdo->runQuery($query, $param_value_array);
    //check for email
    if($result != null) {
        $user_id = $result[0]['id'];

        // Create tokens

        $selector = bin2hex(random_bytes(8));
        $token = bin2hex(random_bytes(32));



        $url = sprintf('%sreset.php?%s', 'http://localhost/forgot_password/', http_build_query([
            'selector' => $selector,
            'validator' => $token
        ]));

        // Token expiration
        $current_date = time();
        $expiration_date = $current_date + (24 * 60 * 60);  // for 1 day
        /*$hashed_token = hash('md5', $current_time . $current_time);*/


        $validate = new Validate();

        $existingToken = $validate -> getTokenByID($user_id);
        if($existingToken != null) {
            $validate->deleteToken($user_id);
        }
        $expiry_date = date("Y-m-d H:i:s", $expiration_date);
        $validate -> insertToken($user_id, $selector, $token, $expiry_date);

        //Get users name




        $mail = new MAIL();
        $epost = $result[0]['epost'];
        $name = "FR RA";
        $subject = "Glemt passord link";
        $body = "<div><p> $name </p> ";
        $body .= "<br><br><p>Click this link to recover your password<br>";
        $body .= sprintf('<a href="%s">%s</a>', $url, $url);
        $body .= "<br><br></p>Regards,<br> Admin.</div>";



        $mail -> sendMail($epost, $name, $subject, $body);

        setcookie("message", 'Reset-link er sendt til epost.', time()+10, '/');
        header('Location: ../');
    }




} else {
    setcookie("message", 'Reset-link er sendt til epost.', time()+10, '/');
    header('Location: ../');
}



?>