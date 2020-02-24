<?php

session_start();

require_once "../include_login/authCookieSessionValidate.php";

if(!$isLoggedIn) {
    header("Location: ../");
}

require_once '../Oversikt/DBOversikt.php';
require_once 'DBAdmin.php';

$pdo = new DBOversikt();

$resultAnsatt = $pdo->ansattOversikt();


if (isset($_POST['submit'])) {
    $dbAdmin = new DBAdmin();

    $bruker_id = (int)$_POST['uid'];
    $navn = $_POST['name'];
    $fodselnr = $_POST['fodselnr'];
    $adresse = $_POST['adresse'];
    $city = $_POST['city'];
    $postkode = $_POST['postkode'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];
    $kretsnr = (int)$_POST['krets'];
    $rolle = $_POST['rolle'];
    $bil = $_POST['bil'];
    $norskferd = $_POST['norsk'];
    $dataferd = $_POST['data'];


//    die(var_dump($bruker_id));

    $dbAdmin->updateEmployee($bruker_id, $navn, $fodselnr, $adresse, $city, $postkode, $email, $telefon, $kretsnr, $rolle, $bil, $norskferd, $dataferd);

    Header('Location:'.$_SERVER['PHP_SELF']);

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.css">

    <style>
        .col-sm-12 button {
            margin: 5px;
        }

        #showPanel {
            background-color: lightgrey;
            height: 200px;
        }

        #employeeForm {

        }

        #updateEmployee {
            margin-top: 125px;
            margin-left: -82%;
        }

        #userButton {
            margin: 5px;
        }
    </style>
</head>
<body>
    <?php include 'menyAdmin.php'?>
    <div class="container">

        <div class="row">

            <h1 id="tableOverskrift">Oversikt over ansatte</h1>
            <table id="oversiktAnsatte" class="table table-striped table-bordered table-hover" style="width:100%">
                <thead>
                <tr>
                    <th style="display: none;">uid</th>
                    <th>Navn</th>
                    <th>Født</th>
                    <th>Adresse</th>
                    <th>By</th>
                    <th>Postkode</th>
                    <th>E-mail</th>
                    <th>Telefon</th>
                    <th>KretsNr</th>
                    <th>Rolle</th>
                    <th>Bil</th>
                    <th>Norskferd</th>
                    <th>Dataferd</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($resultAnsatt as $i => $value) { ?>
                    <tr>
                        <td style="display: none;" onclick="ansatt(); showButton();"><?php echo $resultAnsatt[$i]['bruker_id']?></td>
                        <td onclick="ansatt(); showButton();"><?php echo $resultAnsatt[$i]['navn']?></td>
                        <td onclick="ansatt(); showButton();"><?php echo $resultAnsatt[$i]['fodselnr']?></td>
                        <td onclick="ansatt(); showButton();"><?php echo $resultAnsatt[$i]['adresse']?></td>
                        <td onclick="ansatt(); showButton();"><?php echo $resultAnsatt[$i]['city']?></td>
                        <td onclick="ansatt(); showButton();"><?php echo $resultAnsatt[$i]['postkode']?></td>
                        <td onclick="ansatt(); showButton();"><?php echo $resultAnsatt[$i]['email']?></td>
                        <td onclick="ansatt(); showButton();"><?php echo $resultAnsatt[$i]['telefon']?></td>
                        <td onclick="ansatt(); showButton();"><?php echo $resultAnsatt[$i]['kretsNr']?></td>
                        <td onclick="ansatt(); showButton();"><?php echo $resultAnsatt[$i]['rolle']?></td>
                        <td onclick="ansatt(); showButton();"><?php echo $resultAnsatt[$i]['bil']?></td>
                        <td onclick="ansatt(); showButton();"><?php echo $resultAnsatt[$i]['norskferd']?></td>
                        <td onclick="ansatt(); showButton();"><?php echo $resultAnsatt[$i]['dataferd']?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>

            <div id="selectedUser">
            </div>

            <button onclick="panel()" id="userButton" type="button" style="display: none;">Administrer Bruker</button>
            <div id="showPanel" style="display: none;">
                <form id="employeeForm" method="post" action="administrerBrukere.php">

                    <div class="form-group">
                        <input type="text" id="uid" name="uid"  placeholder="id" readonly style="display:none;">
                    </div>


                    <div class="col-md-2 inputGroupContainer">

                        <div class="form-group">
                            <label for="name">Navn:</label>
                            <input type="text" name="name"  placeholder="Navn">
                        </div>

                        <div class="form-group">
                            <label for="fodselnr">Fødselsnr:</label>
                            <input type="text" id="fodselnr" name="fodselnr"  placeholder="Fødselsnr">
                        </div>

                    </div>


                    <div class="col-md-2 inputGroupContainer">

                        <div class="form-group">
                            <label for="adresse">Adresse:</label>
                            <input type="text" name="adresse"  placeholder="Adresse">
                        </div>

                        <div class="form-group">
                            <label for="city">By:</label>
                            <input type="text" name="city"  placeholder="By">
                        </div>

                    </div>

                    <div class="col-md-2 inputGroupContainer">

                        <div class="form-group">
                            <label for="postkode">Postkode:</label>
                            <input type="text" name="postkode"  placeholder="postkode">
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="text" name="email" placeholder="e-mail">
                        </div>

                    </div>

                    <div class="col-md-2 inputGroupContainer">

                        <div class="form-group">
                            <label for="telefon">Telefon:</label>
                            <input type="text" name="telefon" placeholder="Telefon">
                        </div>

                        <div class="form-group">
                            <label for="krets">KretsNr:</label>
                            <input type="text" name="krets" placeholder="Krets">
                        </div>

                    </div>

                    <div class="col-md-2 inputGroupContainer">

                        <div class="form-group">
                            <label for="rolle">Rolle:</label>
                            <input type="text" name="rolle" placeholder="Rolle">
                        </div>

                        <div class="form-group">
                            <label for="bil">Bil:</label>
                            <input type="text" name="bil" placeholder="Bil">
                        </div>

                    </div>

                    <div class="col-md-2 inputGroupContainer">

                        <div class="form-group">
                            <label for="norsk">Norskferdigheter:</label>
                            <input type="text" name="norsk" placeholder="Norskferd">
                        </div>

                        <div class="form-group">
                            <label for="data">Dataferdigheter:</label>
                            <input type="text" name="data" placeholder="Dataferd">
                        </div>

                    </div>

                    <input class="btn btn-primary" id="updateEmployee"  type="submit" name="submit" value="Endre">
                </form>

            </div>

        </div>
    </div>

</body>
<script type="text/javascript">
    function ansatt() {
        var table = document.getElementById("oversiktAnsatte");

        var rows = table.rows;

        for (var i = 1; i < rows.length; i++) {
            rows[i].onclick = (function() {
                document.getElementById("selectedUser").innerHTML = "Du har valgt ansatt: " +  this.cells[1].innerHTML;
                var form = document.forms['employeeForm'];
                form.elements[0].value = this.cells[0].innerHTML;
                form.elements[1].value = this.cells[1].innerHTML;
                form.elements[2].value = this.cells[2].innerHTML;
                form.elements[3].value = this.cells[3].innerHTML;
                form.elements[4].value = this.cells[4].innerHTML;
                form.elements[5].value = this.cells[5].innerHTML;
                form.elements[6].value = this.cells[6].innerHTML;
                form.elements[7].value = this.cells[7].innerHTML;
                form.elements[8].value = this.cells[8].innerHTML;
                form.elements[9].value = this.cells[9].innerHTML;
                form.elements[10].value = this.cells[10].innerHTML;
                form.elements[11].value = this.cells[11].innerHTML;
                form.elements[12].value = this.cells[12].innerHTML;
            })
        }

    }

    function panel() {
        var x = document.getElementById("showPanel");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function showButton() {
        var x = document.getElementById("userButton");
        if (x.style.display === "none") {
            x.style.display = "block";
        }
    }


</script>
</html>