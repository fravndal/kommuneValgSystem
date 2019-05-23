<?php

session_start();

require_once "../include_login/authCookieSessionValidate.php";

if(!$isLoggedIn) {
    header("Location: ../");
}
// legge til log-in sjekk på administrerbruker
//Rullgardin med alle ansatte
//når valgt ansatt, velg hvilken krets og hvordan rolle ansatt skal ha.
require_once '../admin/Application.php';
require_once '../admin/DBAdmin.php';
require_once '../Oversikt/DBOversikt.php';
$pdo = new DBOversikt();
$app = new Application();
$result = $app->getAllApplications();
$resultStemmestyre = $pdo->stemmestyreOversikt();

if (isset($_POST['submit'])) {
    $dbAdmin = new DBAdmin();

    $bruker_id = (int)$_POST['inp-1'];
    $kretsnr = (int)$_POST['inp-2'];
    $rolle = $_POST['inp-3'];

//    die(var_dump($bruker_id, $kretsnr,$rolle));


    $dbAdmin->insertEmployeeKrets($bruker_id,$kretsnr,$rolle);
    Header('Location:'.$_SERVER['PHP_SELF']);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>stemmestyre</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.css">

    <style>
        label {
            padding: 5px;
        }

        #submit-knapp {
            margin-top: 4px;
        }

        #tableOverskrift {
            font-size: 24px;
        }
    </style>
</head>
<body>

<div class="col-lg-2 inputGroupContainer">
    <form class="form_container" action="endreStemmestyre.php" method="post">
        <label for="inp-1">Velg den ansatte du vil plassere: </label>
        <select class="selectpicker form-control" onclick="showPlacePicker()" id="inp-1" name ="inp-1">
            <?php
            $app = new Application();
            $ansattList = $app->getAllEmployees();
            for ($i = 0; $i<count($ansattList); $i++) {

                echo '<option value="'.$ansattList[$i]['bruker_id'].'">' . $ansattList[$i]['navn'] . '</option>';
            }
            ?>
        </select>

        <div id="velg-sted" style="display: none;">
            <label for="inp-2">Velg krets for denne ansatte: </label>
            <select class="selectpicker form-control" onclick="showRolePicker()" id="inp-2" name ="inp-2">
                <?php
                $app = new Application();
                $kretsList = $app->getAllKretsNr();
                for ($i = 0; $i<count($kretsList); $i++) {

                    echo '<option value="'.$kretsList[$i]['kretsNr'].'">' . $kretsList[$i]['sted'] . '</option>';
                }
                ?>
            </select>
        </div>

        <div id="velg-rolle" style="display: none;">
            <label for="inp-3">Velg rolle for denne ansatte: </label>
            <select class="selectpicker form-control" onclick="showButton()" id="inp-3" name ="inp-3">
                <?php
                $app = new Application();
                $list = $app->getAllRoles();
                for ($i = 0; $i<count($list); $i++) {

                    echo '<option value="'.$list[$i]['rolle'].'">' . $list[$i]['rolle'] . '</option>';
                }
                ?>
            </select>
            <input class="btn btn-primary" id="submit-knapp" type="submit" name="submit" value="Legg til"/>
        </div>
    </form>
</div>

<div class="col-lg-6">
    <p id="tableOverskrift">Oversikt over ansatte på stemmesteder</p>
    <table id="oversiktStemmestyre" class="table table-striped table-bordered table-hover" style="width:100%">
        <thead>
        <tr>
            <th>Kretsnr</th>
            <th>Rolle</th>
            <th>Navn</th>
            <th>Telefon</th>
            <th>Email</th>
            <th>Fødselsnr</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($resultStemmestyre as $i => $value) { ?>
            <tr>
                <td><?php echo $resultStemmestyre[$i]['kretsNr']?></td>
                <td><?php echo $resultStemmestyre[$i]['rolle']?></td>
                <td><?php echo $resultStemmestyre[$i]['navn']?></td>
                <td><?php echo $resultStemmestyre[$i]['telefon']?></td>
                <td><?php echo $resultStemmestyre[$i]['email']?></td>
                <td><?php echo $resultStemmestyre[$i]['fodselnr']?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</body>
<script type="text/javascript">

    function showPlacePicker() {
        var x = document.getElementById("velg-sted");
        if (x.style.display === "none") {
            x.style.display = "block";
        }
    }

    function showRolePicker() {
        var x = document.getElementById("velg-rolle");
        if (x.style.display === "none") {
            x.style.display = "block";
        }
    }

    function showButton() {
        var x = document.getElementById("vis-knapp");
        if (x.style.display === "none") {
            x.style.display = "block";
        }
    }


</script>
</html>