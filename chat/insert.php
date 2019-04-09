<?php
$uname = $_REQUEST ['uname'];
$msg = $_REQUEST['msg'];

$conn = new mysqli('localhost', 'root', '', 'chat');
//mysql_select_db('chat', $con);

$sql = "INSERT INTO logs (username, msg) VALUES ('$uname', '$msg')";
//$sql = ("INSERT INTO logs ('username', 'msg') VALUES ('LEne', 'Heihei'))";

$conn->query($sql);

$result1 = $conn->query("SELECT * FROM logs ORDER by id ASC");

while($extract = $result1->fetch_assoc()) {
    echo "<span class='uname'>" . $extract['username'] . "</span>: <span class='msg'>" . $extract['msg'] . "</span><br>";
}

?>