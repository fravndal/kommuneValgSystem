<?php

/*include_once "../include_login/functions.php";*/
require_once "../include_login/Auth.php";

/*sec_session_start();*/

session_start();

$pdo = new DBController();
$util = new Util();

//FOR USER FEEDBACK
$auth = new Auth();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Glemt passord</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->

    <!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    <!--<script src="../js/jquery.min.js"></script>-->


    <link href="../login/stylesheet/stylesheet.css" rel="stylesheet">

    <style>
        .user_card {
            height: 350px;
        }
    </style>

</head>
<body>

<div class="container h-100">

    <div class="d-flex justify-content-center h-100">

        <div class="user_card">

            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="../images/logo.svg" class="brand_logo" alt="Logo">
                </div>
            </div>
            <div class="d-flex justify-content-center form_container">
                <!-- Panel for login -->

                <form id="loginform" action="send_forgot_password.php" method="post">


                    <div class="input-group mb-3" id="header-forgot-password">
                        <span>Tast inn epost til brukerkontoen din</span>
                    </div>


                    <div class="input-group mb-3" id="email-forgot" >
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="email" name="email-forgot-input" class="form-control input_user" value="" id="email-forgot-input" placeholder="epost" autofocus>
                    </div>


                    <div class="d-flex justify-content-center mt-3 login_container" id="login-button-form">
                        <input class="btn login_btn"
                               type="submit"
                               name="button"
                               value="Send epost reset"
                               id="forgot-button"
                                />
                    </div>


                    <div class="mt-4" id="login-form" >
                        <div class="d-flex justify-content-center links">
                            <div><a href="../index.php" >Gå tilbake</a></div>
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>
</body>
</html>