<?php
// Inkluder dbConfig filen
include '../include_login/DBController.php';
$statusMsg = '';

$pdo = new DBController();


// File upload path
$targetDir = "../uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Tillat visse filtyper
    $allowTypes = array('pdf');
    if(in_array($fileType, $allowTypes)){
        // Last opp fil, til server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Legg inn filnavn i databasen
            $query=("INSERT into opplæringsmateriell (file_name, uploaded_on) VALUES (:file_name, NOW())");
            $param_value_array = array(':file_name' => $fileName);
            $pdo->insert($query, $param_value_array);
            if($pdo){
                $statusMsg = "Filen ".$fileName. " har blitt lastet opp.";
            }else{
                $statusMsg = "Opplastningen feilet, vennligst prøv igjen";
            } 
        }else{
            $statusMsg = "Beklager, en feil oppsto ved opplastningen";
        }
    }else{
        $statusMsg = 'Beklager, kun PDF-filer kan lastes opp.';
    }
}else{
    $statusMsg = 'Vennligst velg en fil for opplastning.';
}

// Vis status melding
echo $statusMsg;
echo '<br><a href="opplaering_admin.php">Tilbake</a>';
?>