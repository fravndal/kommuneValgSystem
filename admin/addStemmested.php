<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nytt stemmested</title>
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

<div class="content">


    <form name="changeform" action="Action_Form_addStemmested.php" method="post" class="form_change">
        <div class="form-group">
            <div class="col-sm-7">
                <label for="kretsnr">Kretsnummer</label>
                <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                    <input id="kretnr" name="kretsnr" placeholder="Kretsnummer" class="form-control" required="true" value="" type="text">
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-7">
                <label for="sted">Sted</label>
                <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                    <input id="sted" name="sted" placeholder="Sted" class="form-control" required="true" value="" type="text">
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-7">
                <label for="stemmeber">Stemmebærere</label>
                <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="stemmeber" name="stemmeber" placeholder="Stemmebærere" class="form-control" required="true" value="" type="text">
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-7 inputGroupContainer" style="margin-top: 2em;">
                <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" onclick="submitForm();">Legg til</a>
            </div>
        </div>

        
        
        
        
    </form>
</div>
</body>


<script>
    function submitForm() {
        var kretsnrField = document.forms["changeform"]["kretsnr"].value;
        var stedField = document.forms["changeform"]["sted"].value;
        var stemmeberField = document.forms["changeform"]["stemmeber"].value;
        document.forms["changeform"].submit();
        
    }
</script>
    
</html>
