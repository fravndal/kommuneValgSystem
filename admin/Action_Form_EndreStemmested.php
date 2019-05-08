<?php

require_once 'DB_update_stemmested.php';


$pdo = new DB_update_stemmested();

$kretsnr = $_POST['kretsnr'];
$sted = $_POST['sted'];
$stemmeber = $_POST['stemmeber'];


$updateStemmestedSuccess = $pdo->updateStemmested($kretsnr, $sted, $stemmeber);


if ($updateStemmestedSuccess) {
    setcookie("message", 'Stemmested er endret.', time()+10, '/');
    header('Location: endreStemmested.php');
} else {
    setcookie("message", 'Noe gikk galt med endring av stemmested.', time()+10, '/');
    header('Location: ../');
}

