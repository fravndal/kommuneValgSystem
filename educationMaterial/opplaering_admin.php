<!DOCTYPE html>
<html>
<body>
<?php include '../admin/menyAdmin.php'?>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Velg fil for opplastning:
    <input type="file" name="file" id="file">
    <input type="submit" value="Last opp PDF" name="submit">
</form>




</body>

</html>