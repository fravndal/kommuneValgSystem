<?php
/**
 * Created by PhpStorm.
 * User: Putten
 * Date: 23.04.2019
 * Time: 15:55
 */
require_once 'DB_update.php';


$pdo = new DB_update();

$email = $_POST['email'];
$user_id = $_COOKIE['user_login'];
$adresse = $_POST['adresse'];
$city = $_POST['city'];
$postkode = $_POST['postkode'];
$telefon = $_POST['telefon'];


$updateMailSuccess = $pdo->updateMail($user_id,$email);
$updateAddressSuccess = $pdo->updateAddress($user_id,$adresse);
$updateCitySuccess = $pdo->updateCity($user_id,$city);
$updateZipCodeSuccess = $pdo->updateZipCode($user_id,$postkode);
$updatePhoneSuccess = $pdo->updateZipCode($user_id,$telefon);

if ($updateMailSuccess) {
    setcookie("message", 'Mailen er endret.', time()+10, '/');
    header('Location: change_user_settings.php');
} else {
    setcookie("message", 'Noe gikk galt med endring av mail.', time()+10, '/');
    header('Location: ../');
}

if ($updateAddressSuccess) {
    setcookie("message", 'Adressen er endret.', time()+10, '/');
    header('Location: change_user_settings.php');
} else {
    setcookie("message", 'Noe gikk galt med endring av adresse.', time()+10, '/');
    header('Location: ../');
}

if ($updateCitySuccess) {
    setcookie("message", 'Byen er endret.', time()+10, '/');
    header('Location: change_user_settings.php');
} else {
    setcookie("message", 'Noe gikk galt med endring av byen.', time()+10, '/');
    header('Location: ../');
}

if ($updateZipCodeSuccess) {
    setcookie("message", 'Postkoden er endret.', time()+10, '/');
    header('Location: change_user_settings.php');
} else {
    setcookie("message", 'Noe gikk galt med endring av postkoden.', time()+10, '/');
    header('Location: ../');
}

if ($updatePhoneSuccess) {
    setcookie("message", 'Telefonnummeret er endret.', time()+10, '/');
    header('Location: change_user_settings.php');
} else {
    setcookie("message", 'Noe gikk galt med endring av telefonnummeret.', time()+10, '/');
    header('Location: ../');
}