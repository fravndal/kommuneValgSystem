<?php
session_start();

require_once "../include_login/authCookieSessionValidate.php";
$auth = new Auth();


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

if (isset($_COOKIE['user_login'])) {
    $user_id = $_COOKIE['user_login'];
    $getAdmin = $auth->getAdminByID($user_id);
    $isAdmin = $getAdmin[0]['admin'];
//    die(var_dump($isAdmin));
}

?>

<!DOCTYPE html>



<html lang="en" xmlns:style="http://www.w3.org/1999/xhtml">


<head>
    <title>Ringerike Valg</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/dashboardDefaultCss.css" media="screen and (max-width: 600px)"/>
    <link rel="stylesheet" type="text/css" media="screen and (min-width: 601px) and (max-width: 1050px)" href="../css/dashboard1050Css.css"/>
    <link rel="stylesheet" type="text/css" media="screen and (min-width: 1051px) and (max-width: 1920px)" href="../css/dashboard1920Css.css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- sidebar -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>



    </style>

</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">

        <div class="dropdown" id="left-dropdown" style="float: left;">
            <i class="fa fa-bars" aria-hidden="true" onclick="openLeftMenu(); displayText(); closeRightMenu()" style="font-size: 35px;">
            </i>
        </div>

        <a class="navbar-brand" id="logoFrame" href="../dashboard/" >  <img id="logo" src="../images/logo.svg" alt="Ringerike kommune" title="Hjem" > <!--style="height: 50px; width: 300px;--></a>

        <div class="dropdown" id="dropdown" style="float: right;">
            <i class="fa fa-cog" aria-hidden="true" onclick="openRightMenu()" style="font-size: 35px;">
            </i>
        </div>

        <div class="w3-sidebar w3-bar-block w3-card w3-animate-right" style="display:none; right:0;" id="rightMenu">
            <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Lukk &times;</button>
            <?php if(!empty($_COOKIE['user_name'])) {?><p>Innlogget bruker: <br>  <?php echo $_COOKIE['user_name']; ?></p><?php } ?>
            <a href="../change_pw/index.php" target="targetFrame" class="w3-bar-item w3-button" onclick="closeRightMenu()"><span class="fa fa-key" style="color: black;"> Endre passord</span></a>
            <a href="../change_settings/change_user_settings.php" target="targetFrame" class="w3-bar-item w3-button" onclick="closeRightMenu()"><span class="fa fa-user"></span>Endre bruker</a>
            <a href="../include_login/logout.php" class="w3-bar-item w3-button" onclick="closeRightMenu()"><span class="fa fa-sign-out" style="color: black;"></span> Logg ut </a>
        </div>


    </div>
</nav>

<!-- Venstre side -->

<div class="d-flex justify-content-between" id="main-content">
    <div class="sidenav col-sm-1" id="sidenav">

        <div class="dropdown-sidenav" id="leftMenu">
            <button onclick="closeLeftMenu()" class="w3-bar-item w3-button w3-large" id="left-close-button">Lukk &times;</button>
            <a href="/oversikt/oversiktStemmested.php" target="targetFrame"><i class="fa fa-building-o" aria-hidden="true"><i id="calendarText" style="display: none;">Stemmested</i></i></a>
            <a href="../educationMaterial/opplaering.php" target="targetFrame"><i class="fa fa-calendar" aria-hidden="true"><i id="worksheetText" style="display: none;">Opplæring</i></i></a>
            <a><i class="fa fa-commenting-o" aria-hidden="true"><i id="chatText" style="display: none;">Chat</i></i></a>
            <?php if ($isAdmin == '1') {
                echo '<a href="../admin/oversikt.php" target="targetFrame"><i class="fa fa-wrench" aria-hidden="true"><i id="administratorText" style="display: none;">Administrering</i></i></a>';
            } ?>
        </div>
    </div>
    <div class="sidenav col-sm-1" id="sidenav-placeholder">

    </div>
    <div id="framediv" class="col-sm-11">
        <iframe id="frame" name="targetFrame" src="startpage.php"></iframe>

    </div>

</div>


<div class="footer-copyright text-center col-sm-12" id="footer">© 2019 Copyright:
    <p> Ringerike Kommune</p>
</div>





</body>
<script type="text/JavaScript" src="sidenav.js"></script>
<script type="text/JavaScript">

    function openLeftMenu() {
        document.getElementById("sidenav").style.display = "inline-block";
    }

    function displayText() {
        document.getElementById("calendarText").style.display = "inline";
        document.getElementById("worksheetText").style.display = "inline";
        document.getElementById("chatText").style.display = "inline";
        document.getElementById("administratorText").style.display = "inline";
        document.getElementById("educationText").style.display = "inline";

    }

    function closeLeftMenu() {
        document.getElementById("sidenav").style.display = "none";
    }


    function openRightMenu() {
        document.getElementById("rightMenu").style.display = "block";
    }

    function closeRightMenu() {
        document.getElementById("rightMenu").style.display = "none";
    }



    /*$('#chatknapp').click(function () {
        $('#maincontent').load("../chat/chat.php");
        return false;

    });*/
</script>
</html>

