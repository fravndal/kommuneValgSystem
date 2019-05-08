<?php
include_once '../include_login/DBController.php';

class DB_add_stemmested

{
    function addStemmested($kretsnr, $sted, $stemmeber) {
        $pdo = new DBController();
        try {
            $query = "INSERT INTO stemmesteder(kretsNr, sted, stemmeber)
            VALUES(:kretsnr, :sted, :stemmeBer)";
            $param_value_array = array(':sted' => $sted, ':stemmeBer' => $stemmeber, ':kretsnr' => $kretsnr);
            $pdo->insert($query, $param_value_array);

            return true;
        } catch(PDOException $exception) {
            return false;
        }
    }

}


                