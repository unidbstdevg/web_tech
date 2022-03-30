<?php
require("db_connect.php");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <script src="https://kit.fontawesome.com/67a40adea3.js" crossorigin="anonymous"></script>
        <link href="html_blocks/styles.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kr2</title>
    </head>
    <body>
<?php
require("html_blocks/menu.html");
?>

<div class="content">
<table border=1>
<th>id</th>
<th>user_name</th>
<th>address</th>
<th>price</th>

<?php
$date_today = date("Y-m-d");
$s = "select * from orders WHERE date = '$date_today'";
var_dump($s);

$res = mysqli_query($con, $s);
if(!$res) {
    print("<h1>Nothing to show</h1>");
} else {
    while($row = mysqli_fetch_array($res)) {
        print("<tr>");
        printf("<td>%s</td>", $row["id"]);
        printf("<td>%s</td>", $row["user_name"]);
        printf("<td>%s</td>", $row["address"]);
        printf("<td>%s</td>", $row["price"]);
        print("</tr>");
    }
}
?>
</table>
</div>
