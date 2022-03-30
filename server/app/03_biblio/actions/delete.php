<?php
require("../db_connect.php");

$id = $_REQUEST["id"];
$s = "DELETE FROM `book` WHERE `id_book` = ".$id;
mysqli_query($con, $s);

header("Location: ../");
?>
