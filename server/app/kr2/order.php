<?php
require("db_connect.php");

if(isset($_REQUEST["order"])) {
    $user_name = $_REQUEST["user_name"];
    $address = $_REQUEST["address"];
    $price = $_REQUEST["price"];

    $date_today = date("Y-m-d");

    $s = "INSERT INTO `orders` (`user_name`, `address`, `price`, `date`) VALUES ('$user_name', '$address', '$price', '$date_today')";
    print($s);

    mysqli_query($con, $s);

    header("Location: list.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <script src="https://kit.fontawesome.com/67a40adea3.js" crossorigin="anonymous"></script>
        <link href="html_blocks/styles.css" rel="stylesheet">
        <link href="html_blocks/form.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kr2</title>
    </head>
    <body>
<?php
require("html_blocks/menu.html");
?>
        <form>
            <span>Step 1: Your details</span>
            <fieldset>
                <label>
                    <span class="desc">Name</span>
                    <input name="user_name" type="text" placeholder="First and last name" required>
                </label>
            </fieldset>
            <span>Step 2: Delivery address</span>
            <fieldset>
                <label>
                    <span class="desc">Address</span>
                    <input name="address" type="text" placeholder="Address" required>
                </label>
            </fieldset>
            <span>Step 3: Price</span>
            <fieldset>
                <label>
                    <span class="desc">Price</span>
                    <input name="price" type="text" placeholder="Price" required>
                </label>
            </fieldset>
            <fieldset>
                <input name="order" type="submit" value="BUY IT!">
            </fieldset>
        </form>
    </body>
</html>

