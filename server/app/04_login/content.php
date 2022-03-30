<?php
require("db_connect.php");

session_start();
if(!empty($_SESSION["login"])) {
    header("Location: user_panel.php?redirected_from_content_php");
}

if(isset($_REQUEST["send"])) {
    $s = "SELECT * FROM `users` WHERE `login` = '".$_REQUEST["login"]."' AND `password` = '".$_REQUEST["password"]."'";
    var_dump($s);

    $res = mysqli_query($con, $s);

    if(!$res) {
        print("<h1>Wrong login/password</h1>");
    } else {
        $user = mysqli_fetch_assoc($res);
        var_dump($user);

        $_SESSION["login"] = $user["login"];
        $_SESSION["password"] = $user["password"];
        $_SESSION["name"] = $user["name"];
        header("Location: user_panel.php");
    }
}
?>

<form>
<fieldset class="user_data">
    <label>
        <span class="desc">Login</span>
        <input type="text" name="login" placeholder="Login:" required>
    </label>
    <label>
        <span class="desc">Password</span>
        <input type="password" name="password" placeholder="Password:" required>
    </label>

</fieldset>
<fieldset class="submit">
    <input type="submit" value="Login" name="send">
    <span>or <a href="register.php">register</a></span>
</fieldset>


</form>
