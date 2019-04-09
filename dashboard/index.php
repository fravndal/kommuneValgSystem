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




</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Her er dropdown funksjonen som ligger oppe i høyre hjørnat -->
            <div class="dropdown">
                <button class="dropbtn">
                    <?php echo $_COOKIE['user_name'];?>
                </button>
                <div class="dropdown-content">
                    <a href="#">Bruker</a>
                    <a href="#">Informasjon</a>
                    <a href="#">Endre passord</a>
                </div>
            </div>




            <a class="navbar-brand" href="#">  <img src="../images/logo.svg" alt="Ringerike kommune" title="Hjem" style="width:300px;height:50px;"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
            </ul>


            <ul class="nav navbar-nav navbar-right">
                <br>
                <li><a href="../include_login/logout.php"><span  class="glyphicon glyphicon-log-in" title="Logg ut" style="color: black;"></span>  </a></li>
            </ul>

        </div>
    </div>
</nav>

<!-- Venstre side -->
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <br>
            <!-- Kalender -->
            <img src="../images/kalender2.png" alt="kalender" title="Kalender" style="height: 70px; width: 60px margin-left: auto;">
            <!-- Min arbeidskalender -->
            <br>
            <br>
            <img src="../images/arbeid.png" alt="minarbeidsplan"  title="Min arbeidsplan" style="height: 70px; width: 60px margin-left: auto;">
            <!-- Chat boks -->
            <br><br>
            <a href="#" id="chatknapp"><img src="../images/mess.png" alt="chat" title="Chat" style="height: 70px; width: 60px margin-left: auto;" > </a>

            <br>
            <br>
            <!-- E-post -->
            <img src="../images/epost.png" alt="epost" title="Melding" style="height: 70px; width: 60px margin-left: auto;">
            <br>
            <br>
        </div>




<!-- Dette er midten av siden med iframes -->
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
        </div>

        <!--<div class="container">
        <div class="col-sm-8 text-left">
            <iframe srcdoc="<!DOCTYPE html>
            <h1>Nyheter</h1>
            "></iframe>
        </div>
        </div>

        <div class="boks">
            <div class="col-sm-8 text-left">
                <iframe srcdoc="<!DOCTYPE html>
                    <h1>Informasjon</h1>
                "></iframe>
            </div>
        </div>
        </div> -->



        </div>
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

