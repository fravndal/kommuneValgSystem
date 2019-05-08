<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ringerike Valg</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="#" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
            background-color: lightblue;
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

<div id="maincontent" class="col-sm-8 text-left">
    <iframe srcdoc="<!DOCTYPE html>
            <h1>Nyhetsfeed</h1>
            <p>Her kan man skrive viktige oppdateringer</p>
            "></iframe>
</div>

<div id="meldinger" class="col-sm-8 text-left">
    <iframe srcdoc="<!DOCTYPE html>
                <h1>Meldinger</h1>
                <p>Her kan man skrive medlinger som skal ut til alle</p>
            "></iframe>
    <a href="../admin/addStemmested.php">Stemmested</a>
</div>


</body>
</html>