<?php
require("../html_blocks/header.html");
require("../html_blocks/menu.html");
?>

<h3>This is user panel page</h3>
<?php
session_start();
if(empty($_SESSION["login"])) {
    print("You are not authorized");
    return;
}

if(isset($_REQUEST["logout"])) {
    session_destroy();
    print("Logout. Bye, ".$_SESSION["name"] . "!");
    return;
}

print("Hello, ".$_SESSION["name"] . "!");
?>

<br>
<a href="?logout">Logout</a>

<?php
require("../html_blocks/footer.html");
?>
