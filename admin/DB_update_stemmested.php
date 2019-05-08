<?php
include_once '../include_login/DBController.php';

class DB_update_stemmested

{
    

    function updateStemmested($kretsnr, $sted, $stemmeber) {
        $pdo = new DBController();
        try {
            $query = "UPDATE stemmesteder SET sted = :sted, stemmeBer = :stemmeBer WHERE kretsNr = :kretsnr";
            $param_value_array = array(':sted' => $sted, ':stemmeBer' => $stemmeber, ':kretsnr' => $kretsnr);
            $pdo->update($query, $param_value_array);

            return true;
        } catch(PDOException $exception) {
            return false;
        }
    }

}

