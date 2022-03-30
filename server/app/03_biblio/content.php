<?php
require("db_connect.php");
?>

<div class="content">
<table border=1>
<th>id</th>
<th>title</th>
<th>author</th>
<th>actions</th>
<?php
$s = "select * from book";
$res = mysqli_query($con, $s);

while($row = mysqli_fetch_array($res)) {
    print("<tr>");
    printf("<td>%s</td>", $row[0]);
    printf("<td>%s</td>", $row["title"]);
    printf("<td>%s</td>", $row[2]);

    print("<td>");
    printf('<a href="delete.php?id=%s">delete</a>', $row[0]);
    print("</td>");
    print("<td>");
    printf('<a href="update.php?id=%s">update</a>', $row[0]);
    print("</td>");

    print("</tr>");
}
?>
</table>
</div>
