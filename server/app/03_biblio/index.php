<?php
require("db_connect.php");

require("html_blocks/header.html");
require("html_blocks/menu.html");
?>

<div class="filter">
    <form>
        <span>Sort by:</span>
        <span>ASC</span>
        <input type="radio" name="sort_by" value="A-Z">
        <input type="radio" name="sort_by" value="Z-A">
        <span>DESC</span>
        <br>

        <span>Price from</span>
        <input type="number" name="price_from" value="<?php isset($_REQUEST["price_from"]) ? print($_REQUEST["price_from"]) : "";?>">
        <span>to</span>
        <input type="number" name="price_to" value="<?php isset($_REQUEST["price_to"]) ? print($_REQUEST["price_to"]) : "";?>">
        <br>

        <span>With id izdat</span>
        <input type="number" name="id_izdat" value="-1">
        <br>

        <span>Pages more than</span>
        <input type="number" name="pages_min" value="-1">
        <br>

        <input type="submit" value="Sort" name="filter">
    </form>
    <br>
</div>

<div class="content">
<table border=1>
<th>id</th>
<th>title</th>
<th>author</th>
<th>price</th>
<th>pages</th>
<th>id_izdat</th>
<th>actions</th>

<?php
if(isset($_REQUEST["filter"])) {
    if(!isset($_REQUEST["sort_by"])) {
        $sort_by = "ASC";
    } else {
        $sort_by = $_REQUEST["sort_by"] == "A-Z" ? "ASC" : "DESC";
    }
    $price_from = $_REQUEST["price_from"];
    $price_to = $_REQUEST["price_to"];
    $id_izdat = $_REQUEST["id_izdat"];
    $pages_min = $_REQUEST["pages_min"];

    if($price_from == "")
        $price_from = 0;
    if($price_to == "")
        $price_to = 999999999999;

    $s = "select * from book WHERE price BETWEEN ".$price_from." AND ".$price_to;

    if($id_izdat != -1) {
        $s .= " AND id_izdat = ".$id_izdat;
    }
    if($pages_min != -1) {
        $s .= " AND pages >= ".$pages_min;
    }
    $s .= " ORDER BY title ".$sort_by." ";
    var_dump($s);
}
else {
    $s = "select * from book";
}

$res = mysqli_query($con, $s);

while($row = mysqli_fetch_array($res)) {
    print("<tr>");
    printf("<td>%s</td>", $row[0]);
    printf("<td>%s</td>", $row["title"]);
    printf("<td>%s</td>", $row["author"]);
    printf("<td>%s</td>", $row["price"]);
    printf("<td>%s</td>", $row["pages"]);
    printf("<td>%s</td>", $row["id_izdat"]);

    print("<td>");
    printf('<a href="actions/delete.php?id=%s">delete</a>', $row[0]);
    print("</td>");
    print("<td>");
    printf('<a href="actions/update.php?id=%s">update</a>', $row[0]);
    print("</td>");

    print("</tr>");
}
?>
</table>
</div>

<?php
require("html_blocks/footer.html");
?>
