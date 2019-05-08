<?php

require_once 'DB_del_stemmested.php';


$pdo = new DB_del_stemmested();

$kretsnr = $_POST['kretsnr'];


$delStemmestedSuccess = $pdo->delStemmested($kretsnr);


if ($delStemmestedSuccess) {
    setcookie("message", 'Stemmested er slettet.', time()+10, '/');
    header('Location: delStemmested.php');
} else {
    setcookie("message", 'Noe gikk galt med sletting av stemmested.', time()+10, '/');
    header('Location: ../');
}

