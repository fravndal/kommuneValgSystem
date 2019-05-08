<?php
include_once '../include_login/DBController.php';

class DB_del_stemmested

{
    function delStemmested($kretsnr) {
        $pdo = new DBController();
        try {
            $query = "DELETE FROM stemmesteder WHERE kretsNr = :kretsnr";
            $param_value_array = array(':kretsnr' => $kretsnr);
            $pdo->update($query, $param_value_array);

            return true;
        } catch(PDOException $exception) {
            return false;
        }
    }

}

