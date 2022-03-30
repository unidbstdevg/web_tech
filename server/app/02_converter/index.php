<?php
$IN_RUB = array();
$IN_RUB["RUB"] = 1;
$IN_RUB["USD"] = 71.14;
$IN_RUB["UAH"] = 2.72;
$IN_RUB["Satoshi"] = 0.05;
$IN_RUB["ETH"] = 331760.62;
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="styles.css" rel="stylesheet">
        <title>Converter</title>
    </head>
    <body>
        <form>
        <input  onfocus="this.value=''" list="cur_from" name="cur_from" value="<?php print(isset($_GET["cur_from"]) ? $_GET["cur_from"] : "RUB") ?>">
            <datalist id="cur_from">
                <option value="RUB"></option>
                <option value="USD"></option>
                <option value="UAH"></option>
                <option value="Satoshi"></option>
                <option value="ETH"></option>
            </datalist>
            <span>--&gt;</span>
            <input onfocus="this.value=''" list="cur_to" name="cur_to" value="<?php print(isset($_GET["cur_to"]) ? $_GET["cur_to"] : "UAH") ?>">
            <datalist id="cur_to">
                <option value="RUB"></option>
                <option value="USD"></option>
                <option value="UAH"></option>
                <option value="Satoshi"></option>
                <option value="ETH"></option>
            </datalist>
            <p><span>Amount: </span><input type="text" name="amount" value="<?php print(isset($_GET["amount"]) ? $_GET["amount"] : "") ?>"></p>

            <p><input type="submit" value="Convert"></p>
        </form>
        <div class="result">
<?php
if (isset($_GET["cur_from"]) && isset($_GET["cur_to"]) && isset($_GET["amount"])) {
    $cur_from = $_GET["cur_from"];
    $cur_to = $_GET["cur_to"];
    $amount = $_GET["amount"];

    /* check that currencies is valid */
    if(!isset($IN_RUB[$cur_from]) || !isset($IN_RUB[$cur_to])) {
        print("Wrong currency!");
    } else {
        $rubs = $amount * $IN_RUB[$cur_from];
        $result = $rubs / $IN_RUB[$cur_to];

        printf("%s %s in %s = %s", $amount, $cur_from, $cur_to, round($result, 2));
    }
}
?>
        </div>
    </body>
</html>

