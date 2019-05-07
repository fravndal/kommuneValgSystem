<?php
include_once '../include_login/DBController.php';

class DBAdmin {

    function updateEmployee($bruker_id, $kretsnr, $navn, $telefon, $email, $fodselsaar, $leder, $nestleder, $sekreter, $vaktmester) {
        $pdo = new DBController();

        try {

            $query = "UPDATE ansatt SET kretsNr = :kretsnr, navn = :navn, telefon = :telefon, email = :email,
                  fodselsaar = :fodsel, leder = :leder, nestLeder = :nestleder, sekreter = :sekreter, vaktmester = :vaktmester WHERE id = :bruker_id";

            $param_value_array = array(':kretsnr' => $kretsnr, ':navn'=> $navn, ':telefon' => $telefon, ':email' => $email, ':fodsel' => $fodselsaar, ':leder' => $leder,
                ':nestleder' => $nestleder, ':sekreter' => $sekreter, ':vaktmester' => $vaktmester, ':bruker_id' => $bruker_id);

            $pdo->update($query, $param_value_array);

            return true;

        } catch(PDOException $exception) {
            return false;
        }


    }
}