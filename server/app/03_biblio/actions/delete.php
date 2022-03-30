<?php
require("../auth/check_auth.php");

require("../db_connect.php");

$id = $_REQUEST["id"];
$s = "DELETE FROM `book` WHERE `id_book` = ".$id;
mysqli_query($con, $s);

file_put_contents("log.txt", $_SESSION["name"] . " has deleted book with id = " . $id . "\n", FILE_APPEND);

header("Location: ../");
?>
