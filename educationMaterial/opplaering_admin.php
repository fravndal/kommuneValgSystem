<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.css">
</head>
<body>
<?php include '../admin/menyAdmin.php'?>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <div class="col-md-4" >
        <input type="file" name="file" id="file" style="margin-top: 10px;">
        <input type="submit" value="Last opp PDF" name="submit">
    </div>

</form>




</body>

</html>