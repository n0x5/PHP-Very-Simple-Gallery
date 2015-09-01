<link rel="stylesheet" href="style.css" type="text/css">
<?php
$month1 = date("F");
$month2 = date("Y");
$month = "$month1 $month2";
$domain = $_GET["i"];
$homepage = file_get_contents($domain);
$folder = "./archive/$month/";
$file = basename($domain);
if (!file_exists("$folder")) {
    mkdir("./archive/$month/", 0755, true);
}

chmod("./archive/$month/", 0755);

htmlspecialchars(file_put_contents($folder . basename($domain), $homepage), 'UTF-8');
chmod("./archive/$month/$file", 0755);
echo "saved to <a href=\"$month/$file\">$_SERVER[HTTP_HOST]/archive/$month/$file</a>";
echo "<img src=\"archive/$month/$file\" width=\"700px\" < /><br>";

?>


