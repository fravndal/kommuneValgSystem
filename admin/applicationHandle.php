<?php
session_start();

require_once "../include_login/authCookieSessionValidate.php";

if(!$isLoggedIn) {
    header("Location: ../");
}

require_once 'Application.php';
$app = new Application();
$result = $app->getAllApplications();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Håndere søknader</title>
    <link rel="shortcut icon" href="#" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <style>
        #application th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: deepskyblue;
            color: white;
        }
        #application tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        #application tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
<?php
if(isset($_COOKIE['message'])) {
    ?>
    <div class="alert alert-warning" role="alert">
        <?php
        echo $_COOKIE['message'];
        ?>
    </div>
    <?php

}
?>

<!-- Main content here -->
<?php include 'menyAdmin.php'?>
<table id="application" class="table table-striped table-bordered" style="width:100%">
    <?php if(!empty($result)) { ?>
        <thead>
        <tr>
            <th>Navn</th>
            <th>Personnummer</th>
            <th>Adresse</th>
            <th>By</th>
            <th>Postkode</th>
            <th>Telefon</th>
            <th>Epost</th>
            <th>Bil</th>
            <th>Norskferdigheter</th>
            <th>Dataferdigheter</th>
        </tr>
        </thead>
        <tfoot>
        <?php if(!empty($result)) { foreach ($result as $i => $value) { ?>


        <tr>
            <td onclick="overlay()" data-toggle="modal" data-target="#myModal" id="name" ><?php echo $result[$i]['navn'] ?></td>
            <td onclick="overlay()" data-toggle="modal" data-target="#myModal" id="birthnumber"><?php echo $result[$i]['fodselnr'] ?></td>
            <td onclick="overlay()" data-toggle="modal" data-target="#myModal" id="address"><?php echo $result[$i]['adresse'] ?></td>
            <td onclick="overlay()" data-toggle="modal" data-target="#myModal" id="city"><?php echo $result[$i]['city'] ?></td>
            <td onclick="overlay()" data-toggle="modal" data-target="#myModal" id="zipcode"><?php echo $result[$i]['postkode'] ?></td>
            <td onclick="overlay()" data-toggle="modal" data-target="#myModal" id="mobilenumber"><?php echo $result[$i]['telefon'] ?></td>
            <td onclick="overlay()" data-toggle="modal" data-target="#myModal" id="email"><?php echo $result[$i]['email'] ?></td>
            <td onclick="overlay()" data-toggle="modal" data-target="#myModal" id="car"><?php echo $result[$i]['bil'] ?></td>
            <td onclick="overlay()" data-toggle="modal" data-target="#myModal" id="norwegianknowlegde"><?php echo $result[$i]['norskferd'] ?></td>
            <td onclick="overlay()" data-toggle="modal" data-target="#myModal" id="dataknowledge"><?php echo $result[$i]['dataferd'] ?></td>
        </tr>
        <?php }}  ?>
        </tfoot>
    <?php } else echo 'Ingen søknader ligger inne' ?>
</table>




<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Vil du legge til denne personen?</h4>
            </div>
            <div class="modal-body">

                <form id="applicationForm" action="process_application.php" method="post" onsubmit="return confirm('Er du sikker på at du vil behandle personen?')">
                    <div class="col-sm-6">
                    <label for="inp-1" class="form-control-plaintext text-right">Fullt navn:</label>
                    <label for="inp-2" class="form-control-plaintext text-right">Personnummer:</label>
                    <label for="inp-3" class="form-control-plaintext text-right">Adresse:</label>
                    <label for="inp-4" class="form-control-plaintext text-right">By:</label>
                    <label for="inp-5" class="form-control-plaintext text-right">Postkode:</label>
                    <label for="inp-6" class="form-control-plaintext text-right">Telefon:</label>
                    <label for="inp-7" class="form-control-plaintext text-right">Epost:</label>
                    <label for="inp-8" class="form-control-plaintext text-right">Bil og førekort:</label>
                    <label for="inp-9" class="form-control-plaintext text-right">Norskferdigheter:</label>
                    <label for="inp-10" class="form-control-plaintext text-right">Dataferdigheter:</label>
                    <label for="inp-11" class="form-control-plaintext text-right">Kretssted:</label>
                    <label for="inp-12" class="form-control-plaintext text-right">Rolle:</label>
                    </div>
                    <div class="col-sm-6">
                    <input type="text" name="inp-1" id="inp-1"  class="form-control-plaintext" readonly>
                    <input type="text" name="inp-2" id="inp-2" class="form-control-plaintext" readonly>
                    <input type="text" name="inp-3" id="inp-3" class="form-control-plaintext" readonly>
                    <input type="text" name="inp-4" id="inp-4" class="form-control-plaintext" readonly>
                    <input type="text" name="inp-5" id="inp-5" class="form-control-plaintext" readonly>
                    <input type="text" name="inp-6" id="inp-6" class="form-control-plaintext" readonly>
                    <input type="text" name="inp-7" id="inp-7" class="form-control-plaintext" readonly>
                    <input type="text" name="inp-8" id="inp-8" class="form-control-plaintext" readonly>
                    <input type="text" name="inp-9" id="inp-9" class="form-control-plaintext" readonly>
                    <input type="text" name="inp-10" id="inp-10" class="form-control-plaintext" readonly>

                        <select class="selectpicker form-control" id="inp-11" name ="inp-11">
                            <?php
                            $app = new Application();
                            $kretsList = $app->getAllKretsNr();
                            for ($i = 0; $i<count($kretsList); $i++) {

                                echo '<option value="'.$kretsList[$i]['kretsNr'].'">' . $kretsList[$i]['sted'] . '</option>';
                            }
                            ?>
                        </select>
                        <select class="selectpicker form-control" id="inp-12" name ="inp-12">
                            <?php
                            $app = new Application();
                            $list = $app->getAllRoles();
                            for ($i = 0; $i<count($list); $i++) {

                                echo '<option value="'.$list[$i]['rolle'].'">' . $list[$i]['rolle'] . '</option>';
                            }
                            ?>
                          </select>
                    </div>



                </form>
            </div>
            <div class="modal-footer">

                <div class="col-sm-3">
                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-check"></i></span>
                        <input type="submit" form="applicationForm" name="approved" class="btn btn-default" value="Godkjenn søknad" id="")">
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-times"></i></span>
                        <input type="submit" form="applicationForm" name="denied" class="btn btn-default" value="Avslå søknad" id="">
                    </div>
                </div>

                <div class="col-sm-7">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>

            </div>
        </div>

    </div>
</div>


<script type="text/javascript">

    function overlay() {
        var table = document.getElementById("application");
        var rows = table.rows;

        for (let i = 1; i < rows.length; i++) {
            rows[i].onclick = (function() {
                document.getElementById('inp-1').value = this.cells[0].innerHTML;
                document.getElementById('inp-2').value = this.cells[1].innerHTML;
                document.getElementById('inp-3').value = this.cells[2].innerHTML;
                document.getElementById('inp-4').value = this.cells[3].innerHTML;
                document.getElementById('inp-5').value = this.cells[4].innerHTML;
                document.getElementById('inp-6').value = this.cells[5].innerHTML;
                document.getElementById('inp-7').value = this.cells[6].innerHTML;
                document.getElementById('inp-8').value = this.cells[7].innerHTML;
                document.getElementById('inp-9').value = this.cells[8].innerHTML;
                document.getElementById('inp-10').value = this.cells[9].innerHTML;
            });
        }
    }
    
    
    
    


</script>


</body>

</html>