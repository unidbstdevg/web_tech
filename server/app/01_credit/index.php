<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="styles.css" rel="stylesheet">
        <title>Credit</title>
    </head>
    <body>
<?php
if (isset($_GET["S"]) && isset($_GET["P"]) && isset($_GET["N"])){
    $S = (float)$_GET["S"];
    $P = (float)$_GET["P"] / 100;
    $N = (float)$_GET["N"];

    printf("Для суммы %s со ставкой %s<br>", $S, $P);

    print("<table>");
    print("<tr><th>Месяц</th><th>Платёж</th></tr>");
    for($i = 1; $i <= $N; $i++) {
        $x = $S * ($P + ($P / (((1 + $P) ** $i) - 1)));
        $x = round($x, 2);

        print("<tr>");
        printf("<td>%s</td><td>%s</td>", $i, $x);
        print("</tr>");
    }
    print("</table>");

    printf("<br>");
}
?>
    <form method="get" action="./">
        <span>Первоначальная сумма кредита</div>
        <input type="text" name="S">
        <br>
        <span>Ежемесячная ставка по процентам</div>
        <input type="text" name="P">
        <br>
        <span>На сколько месяцев</div>
        <input type="text" name="N">
        <br>
        <input type="submit" value="Тыкни меня">
    </form>
    <br>
    <audio src="sound.mp3" controls></audio>

    </body>
</html>
