<?php
include_once '../include_login/DBController.php';
class Application {
    function getAllApplications(){
        $pdo = new DBController();
        $query = "SELECT * FROM soknad";
        $result = $pdo->runBaseQuery($query);
        return $result;
    }

    function getAllKretsNr() {
        $pdo = new DBController();
        $query = "SELECT * FROM stemmesteder";
        $result = $pdo->runBaseQuery($query);
        return $result;
    }

    function getAllRoles() {
        $pdo = new DBController();
        $query = "SELECT * FROM rolle";
        $result = $pdo->runBaseQuery($query);
        return $result;
    }



    function insertUserToUsersTable($email, $password, $salt, $admin, $aktivert){
        $pdo = new DBController();
        $query = "INSERT INTO brukere(epost, passord, salt, admin, aktivert) 
                  VALUES (:email, :password, :salt, :admin, :activated)";
        $param_value_array = array(':email' => $email, ':password' => $password, ':salt' => $salt, ':admin' => $admin, ':activated' => $aktivert);
        $pdo->insert($query, $param_value_array);
    }

    function insertUserToUserInfo($user_id, $name,$socialSecurity,$address,$city,$zipcode,$mobileNumber,$car,$norwegianKnowledge,$dataKnowledge, $email, $kretsNr, $role) {
        $pdo = new DBController();
        $query = "INSERT INTO ansatt(bruker_id, navn, fodselnr, adresse, city, postkode, email, telefon, kretsNr, rolle, bil, norskferd, dataferd) 
                  VALUES (:user_id, :fullname, :socialSecurity, :address, :city, :zipcode, :email, :mobileNumber, :kretsNr, :role, :car, :norwegianKnowledge, :dataKnowledge)";
        $param_value_array = array(':user_id' => $user_id,
                                    ':fullname' => $name ,
                                    ':socialSecurity' => $socialSecurity,
                                    ':address' => $address,
                                    ':city' => $city,
                                    ':zipcode' => $zipcode,
                                    ':mobileNumber' => $mobileNumber,
                                    ':car' => $car,
                                    ':norwegianKnowledge' => $norwegianKnowledge,
                                    ':dataKnowledge' => $dataKnowledge,
                                    ':email' => $email,
                                    ':kretsNr' => $kretsNr,
                                    ':role' => $role);
        $pdo->insert($query, $param_value_array);
    }

    function generatePassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    function insertToken($user_id, $selector, $token) {
        $pdo = new DBController();
        $query = "INSERT INTO aktiver_bruker_passord_pollett (bruker_id, velg_hash, pollett) values (:user_id, :selector, :token)";
        $param_value_array = array(':user_id' => $user_id, ':selector' => $selector, ':token' => $token);
        $pdo->insert($query, $param_value_array);
    }

    function deleteApplication($name, $socialSecurity, $email){
        $pdo = new DBController();
        $query = "DELETE FROM soknad WHERE navn = :fullname and fodselnr = :socialSecurity and email = :email";
        $param_value_array = array(':fullname' => $name, ':socialSecurity' => $socialSecurity, ':email' => $email);
        $pdo->update($query, $param_value_array);
    }

    function getToken($selector, $token) {
        $pdo = new DBController();
        $query = "SELECT * FROM aktiver_bruker_passord_pollett WHERE velg_hash = :velg_hash and pollett = :pollett";
        $param_value_array = array(':velg_hash' => $selector, ':pollett' => $token);
        $result = $pdo->runQuery($query, $param_value_array);
        return $result;
    }

    function deleteToken($user_id) {
        $pdo = new DBController();
        $query = "DELETE FROM aktiver_bruker_passord_pollett WHERE bruker_id = :user_id";
        $param_value_array = array(':user_id' => $user_id);
        $pdo->update($query, $param_value_array);
    }

    function getIDByEmail($email) {
        $pdo = new DBController();
        $query = "SELECT id FROM brukere WHERE epost = :email LIMIT 1";
        $param_value_array = array(':email' => $email);
        $result = $pdo->runQuery($query, $param_value_array);
        return $result;
    }
}



