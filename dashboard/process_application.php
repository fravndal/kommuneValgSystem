<?php

include_once 'Application.php';
include_once '../mail/Mail.php';
$pdo = new DBController();
$app = new Application();

$name = $_POST['inp-1'];
$socSec = $_POST['inp-2'];
$address = $_POST['inp-3'];
$city = $_POST['inp-4'];
$zipcode = $_POST['inp-5'];
$mobile = $_POST['inp-6'];
$email = $_POST['inp-7'];
$car = $_POST['inp-8'];
$norKnowledgde = $_POST['inp-9'];
$dataKnowledge = $_POST['inp-10'];



if(!empty($_POST['approved'])) {
    //Generate random password for user
    $random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
    $password = hash('sha512',$app->generatePassword());
    $password = hash('sha512', $password . $random_salt);
    $role = 'Leder';
    $admin = 0;
    $active = 0;
    //insert user to user-table

    $app->insertUserToUsersTable($email, $password, $random_salt, $role, $admin, $active);
    $user = $app->getIDByEmail($email);

    if($user !=null) {
        $user_id = $user[0]['id'];

        //creating token
        $selector = bin2hex(random_bytes(8));
        $token = bin2hex(random_bytes(32));


        $url = sprintf('%sactivate_user_password_form.php?%s', 'http://localhost/activate/', http_build_query([
            'selector' => $selector,
            'validator' => $token
        ]));

        //insert user-token for activation
        $app -> insertToken($user_id, $selector, $token);

        //insert user-account to database
        $app->insertUserToUserInfo($user_id, $name, $socSec, $address, $city, $zipcode, $mobile, $car, $norKnowledgde, $dataKnowledge);


        //send activation mail to user
        $mail = new Mail();
        $subject = "Aktiver bruker";
        $body = "<div><p> $name </p> ";
        $body .= "<br><br><p>Klikk på linken og sett nytt passord for å aktivere brukerkonto.<br>";
        $body .= sprintf('<a href="%s">%s</a>', $url, $url);
        $body .= "<br><br></p>Regards,<br> Admin.</div>";
        $mail -> sendMail($email, $name, $subject, $body);

        //delete application from user after approved
        $app->deleteApplication($name, $socSec, $email);
        setcookie("message", 'Søknaden er godkjent og mail er sendt til bruker.', time()+10, '/');
        header('Location: applicationHandle.php');
    }
} else {
    $app->deleteApplication($name, $socSec, $email);

    //send mail to user
    $mail = new MAIL();
    $subject = "Avslått søknad";
    $body = "<div><p> $name </p> ";
    $body .= "<br><br><p>Beklager, din søknad er avslått.<br>";
    $body .= "<br><br></p>Regards,<br> Admin.</div>";

    $mail -> sendMail($mail, $name, $subject, $body);



    setcookie("message", 'Søknaden er avslått og mail har blitt sendt til bruker.', time()+10, '/');
    header('Location: applicationHandle.php');
}