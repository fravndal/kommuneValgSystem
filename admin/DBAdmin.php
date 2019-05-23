<?php
include_once '../include_login/DBController.php';

class DBAdmin {

    function updateEmployee($bruker_id, $navn, $fodselnr, $adresse, $city, $postkode, $email, $telefon, $kretsnr, $rolle, $bil, $norskferd, $dataferd) {
        $pdo = new DBController();

        try {

            $query = "UPDATE ansatt SET navn = :navn, fodselnr = :fodselnr, adresse = :adresse, city = :city, postkode = :postkode, email = :email, telefon = :telefon, 
                      kretsNr = :kretsnr, rolle = :rolle, bil = :bil, norskferd = :norskferd, dataferd = :dataferd WHERE bruker_id = :bruker_id";

            $param_value_array = array(':navn' => $navn, ':fodselnr' => $fodselnr, ':adresse' => $adresse, ':city' => $city, ':postkode' => $postkode, ':email' => $email,
                                        ':telefon' => $telefon, ':kretsnr' => $kretsnr, ':rolle' => $rolle, ':bil' => $bil, ':norskferd' => $norskferd, ':dataferd' => $dataferd,
                                        ':bruker_id' => $bruker_id);

            $pdo->update($query, $param_value_array);

            return true;

        } catch(PDOException $exception) {
            return false;
        }


    }

    function insertEmployeeKrets($bruker_id,$kretsnr,$rolle) {
        $pdo = new DBController();

        try {

            $query = "INSERT INTO stemmestyre(bruker_id, kretsNr, rolle, navn, telefon, email, fodselnr) SELECT :bruker_id, :kretsnr, :rolle, ansatt.navn,ansatt.telefon,ansatt.email,ansatt.fodselnr FROM ansatt
                      WHERE bruker_id = :bruker_id";

            $param_value_array = array(':bruker_id' => $bruker_id, ':kretsnr' => $kretsnr,':rolle' => $rolle);

            $pdo->insert($query, $param_value_array);

            return true;

        } catch(PDOException $exception) {
            return false;
        }

    }

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

    function getStaffStemmested($kretsnr) {
        $pdo = new DBController();
        $query = "SELECT * FROM stemmestyre WHERE kretsNr = :kretsnr";
        $param_value_array = array(':kretsnr' => $kretsnr);
        $result = $pdo->runQuery($query, $param_value_array);
        return $result;
    }

}