<?php
require("db_connect.php");

session_start();
if(!empty($_SESSION["login"])) {
    header("Location: user_panel.php?redirected_from_register_php");
}

if(isset($_REQUEST["send"])) {
    $s = "SELECT * FROM `users` WHERE `login` = '".$_REQUEST["login"]."' AND `password` = '".$_REQUEST["password"]."'";

    $res = mysqli_query($con, $s);
    $user = mysqli_fetch_assoc($res);
    var_dump($user);

    if(!empty($user)) {
        print("User already exist!");
        return;
    }
    $s = "INSERT INTO `users` (`name`, `login`, `password`) VALUES ('".$_REQUEST["name"]."', '".$_REQUEST["login"]."', '".$_REQUEST["password"]."')";
    print($s);

    mysqli_query($con, $s);

    $_SESSION["login"] = $_REQUEST["login"];
    $_SESSION["password"] = $_REQUEST["password"];
    $_SESSION["name"] = $_REQUEST["name"];
    header("Location: user_panel.php");
}
?>

<h1>Registration page</h1>
<form>
<fieldset class="user_data">
    <label>
        <span class="desc">Name</span>
        <input type="text" name="name" placeholder="Name:" required>
    </label>
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
    <input type="submit" value="Register" name="send">
</fieldset>


</form>
