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

        <a class="navbar-brand" href="../dashboard/">  <img src="../images/logo.svg" alt="Ringerike kommune" title="Hjem" style="width:300px;height:50px;"></a>

        <div class="dropdown" id="dropdown" style="float: right;">
            <i class="fa fa-cog" aria-hidden="true" onclick="openRightMenu()" style="font-size: 35px;">
            </i>
        </div>

        <div class="w3-sidebar w3-bar-block w3-card w3-animate-right" style="display:none; right:0;" id="rightMenu">
            <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button>
            <p>Innlogget bruker: <br>  <?php echo $_COOKIE['user_name'];?></p>
            <a href="#" class="w3-bar-item w3-button">Bruker</a>
            <a href="#" class="w3-bar-item w3-button">Informasjon</a>
            <a href="../change_pw/index.php" target="targetFrame" class="w3-bar-item w3-button"><span class="fa fa-key" title="Endre passord" style="color: black;"> Endre passord</span></a>
            <a href="../include_login/logout.php" class="w3-bar-item w3-button"><span class="fa fa-sign-out" title="Logg ut" style="color: black;"></span> Logg ut </a>
        </div>


    </div>
</nav>

<!-- Venstre side -->
<div class="d-flex justify-content-between" id="main-content">
    <div class="sidenav col-sm-1" id="sidenav">

        <div class="dropdown-sidenav">
            <a><i class="fa fa-calendar" aria-hidden="true"><i id="calendarText" style="display: none;">Kalender</i></i></a>
            <a><i class="fa fa-building-o" aria-hidden="true"><i id="worksheetText" style="display: none;">Min arbeidsplan</i></i></a>
            <a><i class="fa fa-commenting-o" aria-hidden="true"><i id="chatText" style="display: none;">Chat</i></i></a>
            <?php if ($isAdmin == '1') {
                echo '<a href="../admin/administrerBrukere.php" target="targetFrame"><i class="fa fa-wrench" aria-hidden="true"><i id="administratorText" style="display: none;">Administrering</i></i></a>';
            } ?>
        </div>
    </div>
    <div class="sidenav col-sm-1" id="sidenav-placeholder">

    </div>
    <div id="framediv" class="col-sm-11">
        <iframe id="frame" name="targetFrame" src="startpage.php"></iframe>

    </div>

</div>


<div class="footer-copyright text-center col-sm-12" id="footer">© 2018 Copyright:
    <p> Ringerike Kommune</p>
</div>





</body>
<script type="text/JavaScript" src="sidenav.js"></script>
<script type="text/JavaScript">



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

