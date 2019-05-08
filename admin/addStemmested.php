<?php
require_once '../admin/Application.php';
require_once 'DBOversikt.php';
require_once 'DBAdmin.php';

$pdo = new DBAdmin();
$app = new Application();
$result = $app->getAllApplications();

if (isset($_POST['submit'])) {

    $kretsnr = $_POST['kretsnr'];
    $sted = $_POST['sted'];
    $stemmeber = $_POST['stemmeber'];
    $addStemmestedSuccess = $pdo->addStemmested($kretsnr, $sted, $stemmeber);

    if ($addStemmestedSuccess) {
        setcookie("message", 'Stemmested er lagt til.', time()+10, '/');
        Header('Location:'.$_SERVER['PHP_SELF']);
    } else {
        setcookie("message", 'Noe gikk galt med nytt av stemmested.', time()+10, '/');
        Header('Location:'.$_SERVER['PHP_SELF']);
    }

}

if (isset($_POST['submit-del'])) {

    $kretsnr = (int)$_POST['inp-3'];

    $delStemmestedSuccess = $pdo->delStemmested($kretsnr);


    if ($delStemmestedSuccess) {
        setcookie("message", 'Stemmested er slettet.', time()+10, '/');
        Header('Location:'.$_SERVER['PHP_SELF']);
    } else {
        setcookie("message", 'Noe gikk galt med sletting av stemmested.', time()+10, '/');
        Header('Location:'.$_SERVER['PHP_SELF']);
    }
}

if (isset($_POST['submit-change'])) {

    $kretsnr = $_POST['kretsnr'];
    $sted = $_POST['sted'];
    $stemmeber = $_POST['stemmeber'];

    $updateStemmestedSuccess = $pdo->updateStemmested($kretsnr, $sted, $stemmeber);


    if ($updateStemmestedSuccess) {
        setcookie("message", 'Stemmested er endret.', time()+10, '/');
        Header('Location:'.$_SERVER['PHP_SELF']);
    } else {
        setcookie("message", 'Noe gikk galt med endring av stemmested.', time()+10, '/');
        Header('Location:'.$_SERVER['PHP_SELF']);
    }

}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nytt stemmested</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="stylesheet/stylesheet.css" rel="stylesheet">
    <style>
        .container {
            width: 100%;
        }
    </style>
</head>

<body>
<div class="container">
    <?php if(isset($_COOKIE['message'])) { ?>
        <div class="alert alert-warning stemmested" role="alert" id="message">
        <?php echo $_COOKIE['message']; ?>
        </div>
    <?php } ?>
    <div class="content">
        <div class="col-lg-4 inputGroupContainer">
            <form name="changeform" action="addStemmested.php" method="post" class="form_change">
                <div class="form-group">
                    <div class="col-sm-7">
                        <label for="kretsnr">Kretsnummer</label>
                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                            <input id="kretnr" name="kretsnr" placeholder="Kretsnummer" class="form-control" required="true" value="" type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-7">
                        <label for="sted">Sted</label>
                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input id="sted" name="sted" placeholder="Sted" class="form-control" required="true" value="" type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-7">
                        <label for="stemmeber">Stemmebærere</label>
                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="stemmeber" name="stemmeber" placeholder="Stemmebærere" class="form-control" required="true" value="" type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-7 inputGroupContainer" style="margin-top: 2em;">
                        <input type="submit" name="submit" class="btn btn-primary btn-lg active" value="Legg til" onclick="submitForm();">
                        <input type="submit" name="submit-change" class="btn btn-primary btn-lg active" value="Endre stemmested" onclick="editStemmested();">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-4 inputGroupContainer">
            <form name="delform" action="addStemmested.php" method="post" class="form_change">
            <div class="col-lg-4" id="slett-sted">
                <label for="inp-3">Velg stemmested du vil slette: </label>
                <select class="selectpicker form-control" onclick="showButton()" id="inp-3" name ="inp-3">
                    <?php
                    $app = new Application();
                    $list = $app->getAllStemmesteder();
                    for ($i = 0; $i<count($list); $i++) {

                        echo '<option value="'.$list[$i]['kretsNr'].'">' . $list[$i]['sted'] . '</option>';
                    }
                    ?>
                </select>
                <input type="submit" name="submit-del" class="btn btn-primary btn-lg active" value="Slett" onclick="deleteStemmested();">
            </div>
            </form>
        </div>
    </div>
</div>
</body>


<script>
    function submitForm() {
        var kretsnrField = document.forms["changeform"]["kretsnr"].value;
        var stedField = document.forms["changeform"]["sted"].value;
        var stemmeberField = document.forms["changeform"]["stemmeber"].value;
        document.forms["changeform"].submit();
        
    }

    function deleteStemmested() {
        var kretsnrField = document.forms["delform"]["inp-3"].value;
        document.forms["delform"].submit();

    }

    function editStemmested() {
        var kretsnrField = document.forms["changeform"]["kretsnr"].value;
        var stedField = document.forms["changeform"]["sted"].value;
        var stemmeberField = document.forms["changeform"]["stemmeber"].value;
        document.forms["changeform"].submit();

    }
</script>
    
</html>
