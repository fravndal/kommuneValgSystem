<!DOCTYPE html>
<html lang="en">
<head>
    <title>Endre profil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="stylesheet/stylesheet.css" rel="stylesheet">
</head>

<body>
<div class="container">
    <?php if(isset($_COOKIE['message'])) { ?>
    <div class="alert alert-warning" role="alert" id="message">
        <?php echo $_COOKIE['message']; ?>
    </div>
<?php } ?>

<!--    class="col-md-4 control-label-->
<div class="content">

    <div class="image_container">
        <img src="../images/logo.svg" class="brand_logo" alt="Logo">
    </div>

    <form name="changeform" action="Action_Form.php" method="post" class="form_change">
        <div class="form-group">
            <div class="col-sm-7">
                <label for="email">Email</label>
                <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input id="email" name="email" placeholder="Email" class="form-control" required="true" value="" type="text">
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-7">
                <label for="adresse">Adresse</label>
                <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                    <input id="adresse" name="adresse" placeholder="Adresse" class="form-control" required="true" value="" type="text">
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-7">
                <label for="city">By</label>
                <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                    <input id="city" name="city" placeholder="By" class="form-control" required="true" value="" type="text">
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-7">
                <label for="postkode">Postkode</label>
                <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                    <input id="postkode" name="postkode" placeholder="Postkode" class="form-control" required="true" value="" type="text">
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-7">
                <label for="telefon">Telefon nummer</label>
                <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                    <input id="telefon" name="telefon" placeholder="Telefon nummer" class="form-control" required="true" value="" type="text">
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-7 inputGroupContainer" style="margin-top: 2em;">
                <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" onclick="return validateForm();">Endre</a>
            </div>
        </div>

    </form>
</div>
</body>


<script>
    function validateForm() {
        var emailField = document.forms["changeform"]["email"].value;
        var postkodeField = document.forms["changeform"]["postkode"].value;
        var telefonField = document.forms["changeform"]["telefon"].value;


        //verifisere telefon
        reTelefon = /^[0-9]{8}$/;
        if (!reTelefon.test(telefonField))  {
            alert("Telefon må inneholde 8 siffer");
            return false;
        }

        //verifisere postkode
        rePostkode = /^[0-9]{4}$/;
        if (!rePostkode.test(postkodeField))  {
            alert("Postkode må være 4 siffer");
            return false;
        }

        //verifisere mail
        reMail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!reMail.test(emailField)) {
            alert("Email må være gyldig format. Eks: Ola.nordmann@hotmail.com");
            return false;
        }

        // alt ok submit
        document.forms["changeform"].submit();
        return true;
    }
</script>
</html>
