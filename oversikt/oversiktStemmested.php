<?php
//velg stemmested deretter vis alle ansatte på dette stemmestedet
require_once '../admin/Application.php';
require_once '../admin/DBAdmin.php';
require_once 'DBOversikt.php';
$app = new Application();
$resultStemmesteder = $app->getAllStemmesteder();

$pdo = new DBAdmin();
$kretsnr = '';

if (isset($_POST['submit'])) {
    $kretsnr = $_POST['inp-1'];
    $resultStemmestyre = $pdo->getStaffStemmested($kretsnr);
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
</head>
<body>
<div class="container" style="width: 100%;">
    <div class="col-lg-6">
        <form class="form_container" action="oversiktStemmested.php" method="post">
            <label for="inp-1">Velg stemmested du vil ha oversikt over: </label>
            <select class="selectpicker form-control"  id="inp-1" name ="inp-1">
                <?php
                for ($i = 0; $i<count($resultStemmesteder); $i++) {

                    echo '<option value="'.$resultStemmesteder[$i]['kretsNr'].'">' . $resultStemmesteder[$i]['sted'] . '</option>';
                }
                ?>
            </select>
            <input class="btn btn-primary" type="submit" onclick="showStemmested()" name="submit" value="Velg">
        </form>
    </div>

    <div id="stedDiv" class="col-lg-6">
        <table id="oversiktStemmestyre" class="table table-striped table-bordered table-hover" style="width:100%;">
            <p id="tableOverskrift">Oversikt over ansatte på stemmesteder</p>
            <thead>
            <tr>
                <th>Kretsnr</th>
                <th>Rolle</th>
                <th>Navn</th>
                <th>Telefon</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($resultStemmestyre)) {
                foreach ($resultStemmestyre as $i => $value) { ?>
                    <tr>
                        <td><?php echo $resultStemmestyre[$i]['kretsNr']?></td>
                        <td><?php echo $resultStemmestyre[$i]['rolle']?></td>
                        <td><?php echo $resultStemmestyre[$i]['navn']?></td>
                        <td><?php echo $resultStemmestyre[$i]['telefon']?></td>
                        <td><?php echo $resultStemmestyre[$i]['email']?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <?php } ?>
        </table>
    </div>
</div>
</body>

</html>
