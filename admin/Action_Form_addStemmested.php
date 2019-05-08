<?php

require_once 'DB_add_stemmested.php';


$pdo = new DB_add_stemmested();

$kretsnr = $_POST['kretsnr'];
$sted = $_POST['sted'];
$stemmeber = $_POST['stemmeber'];


$addStemmestedSuccess = $pdo->addStemmested($kretsnr, $sted, $stemmeber);


if ($addStemmestedSuccess) {
    setcookie("message", 'Stemmested er lagt til.', time()+10, '/');
    header('Location: endreStemmested.php');
} else {
    setcookie("message", 'Noe gikk galt med nytt av stemmested.', time()+10, '/');
    header('Location: ../');
}

