<!DOCTYPE HTML>
<html>
<?php
require_once 'DBOpplaering.php';
$pdo = new DBOpplaering();

$fil = $pdo->finnPDF();
?>
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
        .modal-dialog{
            width:70%;
            height:600px;
        }
    </style>
</head>
<body>
    <div class="container">

        <div class="row">
            <!-- Modal -->
            <div class="modal fade" id="modal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <span id="modalContent">
                                <iframe id="iframe" width="100%" height="500px"></iframe>
                            </span>
                        </div>
                    </div>

                </div>
            </div>

            <h1 id="tableOverskrift">Oversikt over opplæringsmateriell</h1>
            <table id="opplæringsmateriell" class="table table-striped table-bordered table-hover" style="width:100%">
                <thead>
                <tr>
                    <th>Fil</th>
                </tr>
                </thead>
                <tbody>
                    <?php if($fil!=NULL){
                    foreach ($fil as $i => $value) { ?>
                    <tr>
                        <td data-toggle="modal" data-target="#modal" onclick="bilde()"><?php $filnavn = $fil[$i]['file_name'];echo $filnavn; ?></td>
                    </tr>
                    <?php }} else if ($fil=NULL){?>
                        <h1>tomt</h1>
                        <tr>
                            <td data-toggle="modal" data-target="#modal">Ingen filer funnet</td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>

        </div>
    </div>

    <script type="text/javascript">
        function bilde() {
            const table = document.getElementById("opplæringsmateriell");
            const rows = table.rows;

            for (let i = 1; i < rows.length; i++) {
                rows[i].onclick = (function() {
                    const filNavn = this.cells[0].innerHTML;
                    $('.modal-title').html(filNavn.slice(0,-4));
                    var x = document.getElementById('iframe');
                    x.setAttribute('src', '../uploads/'+filNavn+'');
                });
            }
        }

    </script>

</body>
</html>