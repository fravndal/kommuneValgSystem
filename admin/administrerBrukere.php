<?php

require_once '../Oversikt/DBOversikt.php';
require_once 'DBAdmin.php';

$pdo = new DBOversikt();

$resultAnsatt = $pdo->ansattOversikt();


if (isset($_POST['submit'])) {
    $dbAdmin = new DBAdmin();

    $bruker_id = (int)$_POST['uid'];
    $kretsnr = (int)$_POST['krets'];
    $navn = $_POST['name'];
    $telefon = $_POST['phone'];
    $email = $_POST['email'];
    $fodselsaar = (int)$_POST['dateOfBirth'];
    $leder = (int)$_POST['leader'];
    $nestleder = (int)$_POST['sLeader'];
    $sekreter = (int)$_POST['secratary'];
    $vaktmester = (int)$_POST['janitor'];

//    die(var_dump($bruker_id));

    $dbAdmin->updateEmployee($bruker_id, $kretsnr, $navn, $telefon, $email, $fodselsaar, $leder, $nestleder, $sekreter, $vaktmester);

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
            background-color: lightblue;
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
                    <th>KretsNummer</th>
                    <th>Navn</th>
                    <th>Telefon</th>
                    <th>email</th>
                    <th>Fødselsår</th>
                    <th>leder</th>
                    <th>nestleder</th>
                    <th>sekretær</th>
                    <th>vaktmester</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($resultAnsatt as $i => $value) { ?>
                    <tr>
                        <td style="display: none;" onclick="ansatt(); showButton();"><?php echo $resultAnsatt[$i]['id']?></td>
                        <td onclick="ansatt(); showButton();"><?php echo $resultAnsatt[$i]['kretsNr']?></td>
                        <td onclick="ansatt(); showButton();"><?php echo $resultAnsatt[$i]['navn']?></td>
                        <td onclick="ansatt(); showButton();"><?php echo $resultAnsatt[$i]['telefon']?></td>
                        <td onclick="ansatt(); showButton();"><?php echo $resultAnsatt[$i]['email']?></td>
                        <td onclick="ansatt(); showButton();"><?php echo $resultAnsatt[$i]['fodselsaar']?></td>
                        <td onclick="ansatt(); showButton();"><?php echo $resultAnsatt[$i]['leder']?></td>
                        <td onclick="ansatt(); showButton();"><?php echo $resultAnsatt[$i]['nestLeder']?></td>
                        <td onclick="ansatt(); showButton();"><?php echo $resultAnsatt[$i]['sekreter']?></td>
                        <td onclick="ansatt(); showButton();"><?php echo $resultAnsatt[$i]['vaktmester']?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>

            <div id="selectedUser" style="background-color: lightgrey;">
            </div>

            <button onclick="panel()" id="userButton" type="button" style="display: none;">Administrer Bruker</button>
            <div id="showPanel" style="display: none;">
                <form id="employeeForm" method="post" action="administrerBrukere.php">

                    <div class="form-group">
                        <input type="text" id="uid" name="uid"  placeholder="id" readonly style="display:none;">
                    </div>


                    <div class="col-md-2 inputGroupContainer">

                        <div class="form-group">
                            <label for="krets">Kretsnr:</label>
                            <input type="text" id="krets" name="krets"  placeholder="Kretsnr">
                        </div>


                        <div class="form-group">
                            <label for="name">Navn:</label>
                            <input type="text" name="name"  placeholder="Navn">
                        </div>
                    </div>


                    <div class="col-md-2 inputGroupContainer">
                        <div class="form-group">
                            <label for="phone">Telefon:</label>
                            <input type="text" name="phone"  placeholder="Telefon">
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="text" name="email"  placeholder="E-mail">
                        </div>
                    </div>

                    <div class="col-md-2 inputGroupContainer">
                        <div class="form-group">
                            <label for="dateOfBirth">Fødselsår:</label>
                            <input type="text" name="dateOfBirth"  placeholder="Fødselsår">
                        </div>

                        <div class="form-group">
                            <label for="leader">Leder:</label>
                            <input type="text" name="leader" placeholder="Leder">
                        </div>
                    </div>

                    <div class="col-md-2 inputGroupContainer">
                        <div class="form-group">
                            <label for="sLeader">Nestleder:</label>
                            <input type="text" name="sLeader" placeholder="Nestleder">
                        </div>

                        <div class="form-group">
                            <label for="secratary">Sekretær:</label>
                            <input type="text" name="secratary" placeholder="Sekretær">
                        </div>
                    </div>

                    <div class="col-md-2 inputGroupContainer">
                        <div class="form-group">
                            <label for="janitor">Vaktmester:</label>
                            <input type="text" name="janitor" placeholder="Vaktmester">
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