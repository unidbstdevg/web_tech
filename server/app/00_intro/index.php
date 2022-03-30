<?php
if (isset($_GET['sub'])){
    $name=$_GET['n'];
    print("hello ".$name);
}
?>
<html>
    <body>
        <form method="get" action="./">
            <input type="text" name="n">
            <input type="submit" name="sub" value="send">
        </form>
    </body>
</html>
