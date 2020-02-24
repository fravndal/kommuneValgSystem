<?php

$conn = new mysqli('localhost', 'root', '', 'chat');

$result1 = $conn->query("SELECT * FROM logs ORDER by id ASC");

while($extract = $result1->fetch_assoc()) {
    echo $extract['username'] . ": " . $extract['msg'] . "<br>";
}

?>