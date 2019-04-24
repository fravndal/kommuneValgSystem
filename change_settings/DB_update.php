<?php
/**
 * Created by PhpStorm.
 * User: Putten
 * Date: 23.04.2019
 * Time: 15:57
 */
include_once '../include_login/DBController.php';
class DB_update
{
    function updateMail($user_id, $email) {
        $pdo = new DBController();
        try {
            $query = "UPDATE brukere SET email = :email WHERE :id = id_bruker";
            $param_value_array = array(':email' => $email, ':id' => $user_id);
            $pdo->update($query, $param_value_array);

            return true;
        } catch(PDOException $exception) {
            return false;
        }
    }

    function updateAddress($user_id, $adresse) {
        $pdo = new DBController();
        try {
            $query = "UPDATE bruker_info SET adresse = :adresse WHERE :id = id_bruker";
            $param_value_array = array(':adresse' => $adresse, ':id' => $user_id);
            $pdo->update($query, $param_value_array);

            return true;
        } catch(PDOException $exception) {
            return false;
        }
    }

    function updateCity($user_id, $city) {
        $pdo = new DBController();
        try {
            $query = "UPDATE bruker_info SET city = :city WHERE :id = id_bruker";
            $param_value_array = array(':city' => $city, ':id' => $user_id);
            $pdo->update($query, $param_value_array);

            return true;
        } catch(PDOException $exception) {
            return false;
        }
    }

    function updateZipCode($user_id, $postkode) {
        $pdo = new DBController();
        try {
            $query = "UPDATE bruker_info SET postkode = :postkode WHERE :id = id_bruker";
            $param_value_array = array(':postkode' => $postkode, ':id' => $user_id);
            $pdo->update($query, $param_value_array);

            return true;
        } catch(PDOException $exception) {
            return false;
        }
    }
    function updateTelefon($user_id, $telefon) {
        $pdo = new DBController();
        try {
            $query = "UPDATE bruker_info SET telefon = :telefon WHERE :id = id_bruker";
            $param_value_array = array(':telefon' => $telefon, ':id' => $user_id);
            $pdo->update($query, $param_value_array);

            return true;
        } catch(PDOException $exception) {
            return false;
        }
    }
}