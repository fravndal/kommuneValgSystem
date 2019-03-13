<?php
// Check for tokens
$selector = filter_input(INPUT_GET, 'selector');
$validator = filter_input(INPUT_GET, 'validator');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nytt passord</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <script type="text/JavaScript" src="../js_login/sha512.js"></script>

</head>
<body>
<?php

if ( false !== ctype_xdigit( $selector ) && false !== ctype_xdigit( $validator ) ) :
    ?>

    <div class="container">
        <div class="col-sm-6 col-sm">

            <h1>Lag et nytt passord</h1>

            <form id="passwordform" action="activate_user.php" method="post">

                <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                <?php include "../password_form/password_form.php"; ?>
                <div class="d-flex">
                    <div class="col-sm-6">
                        <input type="button"
                               class="btn save_btn"
                               value="Gå tilbake"
                               onclick="location.href = '/dashboard/'" />
                    </div>
                    <div class="col-sm-6">
                        <input type="button"
                               class="btn save_btn"
                               value="Lagre passord"
                               onclick="return resetpwformhash(this.form,
                                                       this.form.new_password,
                                                       this.form.confirm_password);" />
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php endif; ?>
</body>


<script type="text/JavaScript" src="../change_pw/validate.js"></script>
<script type="text/JavaScript" src="../js_login/forms.js"></script>

</html>
