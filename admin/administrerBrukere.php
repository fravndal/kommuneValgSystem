<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.css">

    <style>
        .col-sm-12 button {
            margin: 5px;
        }
    </style>
</head>
<body>
    <?php include 'menyAdmin.php'?>

    <?php if(isset($_POST['btnTest'])) {
        var_dump($_POST['btnTest']);
    } ?>

    <div id="content">
        
    </div>
</body>
</html>