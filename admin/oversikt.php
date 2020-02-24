<?php

session_start();

require_once "../include_login/authCookieSessionValidate.php";

if(!$isLoggedIn) {
    header("Location: ../");
}

require_once 'DBOversikt.php';
$pdo = new DBOversikt();

$result = $pdo->stemmestedOversikt();
$resultAnsatt = $pdo->ansattOversikt();

?>
<html>
<head>
    <title>Oversikt</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"></script>
    <script src="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"></script>
    <script src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.css">
    <style>
        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            /*background: #60a3bc !important;*/
        }

        .container {
            width: 70%;
        }

        th {
            background-color: #8CCCF1;
        }

        #tableOverskrift {
            padding 5px;
            font-size: 25px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php include 'menyAdmin.php'?>

            <h1 id="tableOverskrift">Oversikt over stemmesteder</h1>
            <table id="oversiktStemmested" class="table table-striped table-bordered table-hover" style="width:100%">
                <thead>
                <tr>
                    <th>KretsNummer</th>
                    <th>Sted</th>
                    <th>Stemmebærere</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $i => $value) { ?>
                    <tr>
                        <td ><?php echo $result[$i]['kretsNr']?></td>
                        <td ><?php echo $result[$i]['sted']?></td>
                        <td ><?php echo $result[$i]['stemmeBer']?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>

</body>
<script type="text/javascript">


</script>
</html>
