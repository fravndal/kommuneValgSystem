<?php
include_once '../include_login/DBController.php';

class DBAdmin {

    function updateEmployee($kretsnr, $navn, $telefon, $email, $fodselsaar, $leder, $nestleder, $sekreter, $vaktmester, $bruker_id) {
        $pdo = new DBController();
        $query = "UPDATE ansatt SET kretsNr = :kretsnr, navn = :navn, telefon = :telefon, email = :email,
                  fodselsaar = :fodsel, leder = :leder, nestLeder = :nestleder, sekreter = :sekreter, vaktmester = :vaktmester WHERE bruker_id = :bruker_id";

        $param_value_array = array(':kretsnr' => $kretsnr, ':navn'=> $navn, ':telefon' => $telefon, ':email' => $email, ':fodsel' => $fodselsaar, ':leder' => $leder,
                                    ':nestleder' => $nestleder, ':sekreter' => $sekreter, ':vaktmester' => $vaktmester, ':bruker_id' => $bruker_id);

        $pdo->update($query, $param_value_array);

    }
}