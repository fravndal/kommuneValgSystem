<?php
require_once 'Validate.php';

// Get tokens



$time = time();
$selector = $_POST['selector'];
$token = $_POST['validator'];


$validate = new Validate();
$tokenFromDatabase = $validate->getTokenBySelector($selector, $time);


if ( $tokenFromDatabase == null )  {
    setcookie("message", 'Linken er ikke gyldig', time()+10, '/');
    header('Location: ../');
}

$auth_selector = $tokenFromDatabase[0]['velg_hash']; //
$auth_token = $tokenFromDatabase[0]['pollett']; //


$hash_database_selector = hash('sha256',$auth_selector);
$hash_database_token = hash('sha256',$auth_token);
$databaseToken = hash('sha256', $hash_database_selector . $hash_database_token);

$hash_selector = hash('sha256', $selector);
$hash_token = hash('sha256', $token);
$token = hash('sha256', $hash_selector . $hash_token);


// Validate tokens
if ( hash_equals( $token, $databaseToken) )  {
    require_once '../include_login/Auth.php';

    $pdo = new DBController();
    $auth = new Auth();

    //check if user exists
    $user_id = $tokenFromDatabase[0]['bruker_id'];
    $user = $auth->getUserByID($user_id);
    if($user != null) {
        $user_credentials = $auth->getPasswordByID($user_id);
        $user_salt = $user_credentials[0]['salt'];


        // Update password
        $new_password = hash('sha512', $_POST['p'] . $user_salt);
        $query = "UPDATE brukere SET passord = :password WHERE id = :user_id";
        $param_value_array = array(':user_id' => $user_id, ':password' => $new_password);
        $pdo->update($query, $param_value_array);




        // Delete any existing password reset for this user
        $validate->deleteToken($user_id);

        session_destroy();
        setcookie("message", 'Passordet er endret', time()+10, '/');
        header('Location: ../');

    }

}