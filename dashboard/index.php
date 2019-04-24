<?php
session_start();

require_once "../include_login/authCookieSessionValidate.php";

if(!$isLoggedIn) {
    header("Location: ../");
}
?>
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

<!DOCTYPE html>



<html lang="en" xmlns:style="http://www.w3.org/1999/xhtml">


<head>
    <title>Ringerike Valg</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/css.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">

        <a class="navbar-brand" href="#">  <img src="../images/logo.svg" alt="Ringerike kommune" title="Hjem" style="width:300px;height:50px;"></a>





        <!-- Her er dropdown funksjonen som ligger oppe i høyre hjørnat -->
        <div class="dropdown" style="float: right;">
            <i class="fa fa-cog" aria-hidden="true" style="font-size: 35px;">

            </i>

            <div class="dropdown-content">
                <?php echo $_COOKIE['user_name'];?>
                <a href="#">Bruker</a>
                <a href="#">Informasjon</a>
                <a href="#">Endre passord</a>
                <a href="../include_login/logout.php"><span  class="glyphicon glyphicon-log-in" title="Logg ut" style="color: black;"></span> Logg ut </a>
            </div>
        </div>



    </div>
</nav>

<!-- Venstre side -->
<div class="sidenav">

            <a><i class="fa fa-calendar" aria-hidden="true"><i style="display: none;">Kalender</i></i></a>
            <a><i class="fa fa-building-o" aria-hidden="true"><i style="display: none;">Min arbeidsplan</i></i></a>
            <a><i class="fa fa-commenting-o" aria-hidden="true"><i style="display: none;">Chat</i></i></a>
    <a href="../include_login/logout.php"><span  class="glyphicon glyphicon-log-in" title="Logg ut" style="color: black;"></span> Logg ut </a>

</div>






<footer class="container-fluid text-center">
    <p>Footer Text</p>
</footer>



</body>

<script>
    $('#chatknapp').click(function () {
        $('#maincontent').load("../chat/chat.php");
        return false;

    });
</script>
</html>

