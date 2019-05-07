<?php
require_once 'DBstemmestyre.php';
$pdo = new DBstemmestyre();

$result = $pdo->stemmestedOversikt();
$resultAnsatt = $pdo->ansattOversikt();

var_dump($result)
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

        #modalContent {
            font-size: 18px;
        }

        .modal-title {
            font-size: 20px;
        }

        #tableOverskrift {
            padding 5px;
            font-size: 25px;
        }
    </style>
</head>
<body>
<?php  ?>



<div class="container">
    <div class="col-sm-12">
        <?php for($i = 0;$i<count($result);$i++) {
            echo '<a href="#" target="targetFrame"><button id="krets1" name="btnTest" type="button" class="btn btn-primary">Kretsnr '.$result[$i]["kretsNr"].'</button></a>';
        }
        ?>
    </div>
    <div class="row">

        <h1 id="tableOverskrift">Oversikt over ansatte</h1>
        <table id="oversiktStemmetyre" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead>
            <tr>

                <th>Funksjon: </th>
                <th>Navn: </th>
                <th>Telefon: </th>
                <th>Mail: </th>
                <th>Fødselsår: </th>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($resultStemmestyre as $i => $value) { ?>
                <tr>
                    <td><?php echo $resultStemmestyre[$i]['rolle']?></td>
                    <td><?php echo $resultStemmestyre[$i]['navn']?></td>
                    <td><?php echo $resultStemmestyre[$i]['telefon']?></td>
                    <td><?php echo $resultStemmestyre[$i]['epost']?></td>
                    <td><?php echo $resultStemmestyre[$i]['fødselsår']?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

</div>


</body>
</html>


