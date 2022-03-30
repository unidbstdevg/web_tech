<?php
require("db_connect.php");

require("header.html");

if(isset($_REQUEST["send"])) {
    $title = $_REQUEST["title"];
    $author = $_REQUEST["author"];
    $price = $_REQUEST["price"];
    $pages = $_REQUEST["pages"];
    $id_izdat = $_REQUEST["id_izdat"];

    $s = "INSERT INTO `book` (`title`, `author`, `price`, `pages`, `id_izdat`) VALUES ('$title', '$author', '$price', '$pages', '$id_izdat')";
    print($s);

    mysqli_query($con, $s);
    /* header("Location: ./"); */

}
?>

<form>
<input type="text" name="title" required>
<input type="text" name="author" required>
<input type="number" name="price" required>
<input type="number" name="pages" required>
<input type="number" name="id_izdat" required>
<input type="submit" value="Send" name="send">

</form>

<?php
require("footer.html");
?>
