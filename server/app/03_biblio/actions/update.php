<?php
require("../db_connect.php");

require("../html_blocks/header.html");
require("../html_blocks/menu.html");

if(isset($_REQUEST["target_id"])) {
    $target_id = $_REQUEST["target_id"];
    $title = $_REQUEST["title"];
    $author = $_REQUEST["author"];
    $price = $_REQUEST["price"];
    $pages = $_REQUEST["pages"];
    $id_izdat = $_REQUEST["id_izdat"];

    $s = "UPDATE book SET title = '".$title."', author = '".$author."', price = '".$price."', pages = '".$pages."', id_izdat = '".$id_izdat."' WHERE id_book = ".$target_id;
    print($s);
    mysqli_query($con, $s);
    header("Location: ../");
}

if(!isset($_REQUEST["id"])) {
    exit("No id parameter provided");
}

$id = $_REQUEST["id"];
print("id=".$id."\n");

$s = "SELECT * FROM `book` WHERE `id_book` = ".$id;

$res = mysqli_query($con, $s);

$asd = mysqli_fetch_row($res);
print("<form>");
print('<input hidden type="text" name="target_id" value="'.$id.'" required>');
print('<input type="text" name="title" value="'.$asd[1].'" required>');
print('<input type="text" name="author" value="'.$asd[2].'" required>');
print('<input type="text" name="price" value="'.$asd[3].'" required>');
print('<input type="text" name="pages" value="'.$asd[5].'" required>');
print('<input type="text" name="id_izdat" value="'.$asd[6].'" required>');
print('<input type="submit" value="Send" name="send">');
print("</form>");


require("../html_blocks/footer.html");
?>
