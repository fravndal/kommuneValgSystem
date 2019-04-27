<?php
require_once '../admin/Application.php';

// Get tokens
$selector = $_POST['selector'];
$token = $_POST['validator'];

$app = new Application();
$tokenFromDatabase = $app->getToken($selector, $token);


if ( $tokenFromDatabase == null )  {
    setcookie("message", 'Linken er ikke gyldig, kontakt administrator', time()+10, '/');
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
        $activated = 1;
        $new_password = hash('sha512', $_POST['p'] . $user_salt);

        $query = "UPDATE brukere SET passord = :password, aktivert = :activated WHERE id = :user_id";
        $param_value_array = array(':user_id' => $user_id,
                                    ':password' => $new_password,
                                    ':activated' => $activated);
        $pdo->update($query, $param_value_array);




        // Delete any existing password reset for this user
        $app->deleteToken($user_id);

        session_destroy();
        setcookie("message", 'Brukeren er aktivert, logg inn med nytt passord.', time()+10, '/');
        header('Location: ../');

    }

}