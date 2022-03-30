<?php
session_start();
if(empty($_SESSION["login"])) {
    header("Location: /03_biblio/auth/login.php");
    exit();
}
?>
