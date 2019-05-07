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
}