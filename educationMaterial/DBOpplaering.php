<?php
include_once '../include_login/DBController.php';

class DBOpplaering {

    function finnPDF() {
        $pdo = new DBController();
        $query = "SELECT file_name FROM opplæringsmateriell";
        $fil = $pdo->runBaseQuery($query);

        return $fil;
    }
}