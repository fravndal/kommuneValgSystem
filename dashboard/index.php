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
<!--    <link rel="stylesheet" media="screen and (min-width: 1051px)" href="../css/dashboard1920Css.css">-->
    <link rel="stylesheet"  href="../css/dashboardDefaultCss.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- sidebar -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        @media screen and (min-width: 1051px) and (max-width: 1920px) {
            #framediv .container {
                height: 450px;
                width: 100%;
            }

            .dropdown {
                position: relative;
                display: inline-block;
                padding-top: 12px;
            }


            .sidenav {
                z-index: 1; /* Stay on top */
                overflow-y: hidden; /* Disable horizontal scroll */
                transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
                background-image: url("../images/betong.png");
                height: 50px;
                font-size: 25px;
            }


    </style>

</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">

        <a class="navbar-brand" href="#">  <img src="../images/logo.svg" alt="Ringerike kommune" title="Hjem" style="width:300px;height:50px;"></a>

        <div class="dropdown" style="float: right;">
            <i class="fa fa-cog" aria-hidden="true" onclick="openRightMenu()" style="font-size: 35px;">
            </i>
        </div>

        <div class="w3-sidebar w3-bar-block w3-card w3-animate-right" style="display:none; right:0;" id="rightMenu">
            <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button>
            <p>Innlogget bruker: <br>  <?php echo $_COOKIE['user_name'];?></p>
            <a href="#" class="w3-bar-item w3-button">Bruker</a>
            <a href="#" class="w3-bar-item w3-button">Informasjon</a>
            <a href="#" class="w3-bar-item w3-button">Endre passord</a>
            <a href="../include_login/logout.php" class="w3-bar-item w3-button"><span  class="glyphicon glyphicon-log-in" title="Logg ut" style="color: black;"></span> Logg ut </a>
        </div>


    </div>
</nav>

<!-- Venstre side -->
<div class="sidenav">

    <div class="dropdown-sidenav">
        <a><i class="fa fa-calendar" aria-hidden="true"><i style="display: none;">Kalender</i></i></a>
        <a><i class="fa fa-building-o" aria-hidden="true"><i style="display: none;">Min arbeidsplan</i></i></a>
        <a><i class="fa fa-commenting-o" aria-hidden="true"><i style="display: none;">Chat</i></i></a>
        <div class="dropdown-sidenav-content">
            <a href="#">Kalender</a>
            <a href="#">Arbeidsplan</a>
            <a href="#">Chat</a>
        </div>
    </div>
</div>

<div id="framediv" class="container">
    <iframe id="frame" src="../oversikt/oversikt.php"></iframe>
    <footer class="container-fluid text-center">
        <p>Footer Text</p>
    </footer>
</div>

</body>

<script>

    function openRightMenu() {
        document.getElementById("rightMenu").style.display = "block";
    }

    function closeRightMenu() {
        document.getElementById("rightMenu").style.display = "none";
    }

    $('#chatknapp').click(function () {
        $('#maincontent').load("../chat/chat.php");
        return false;

    });
</script>
</html>

