<link rel="stylesheet" href="style.css" type="text/css">
<?php
$month1 = date("F");
$month2 = date("Y");
$month = "$month1$month2";
$domain = $_GET["i"];
$homepage = file_get_contents($domain);

$file = basename($domain);

$path_parts = pathinfo($file);
    $pathp2 = $path_parts['filename'];

$rmlast = substr($pathp2, 0, -2);
$folder = "./archive/$month/$rmlast/";
$maindir = "/your/webp/archive";

if (!file_exists("$folder")) {
    mkdir("$maindir/$month/$rmlast/", 0755, true);
}

chmod("$maindir/$month/$rmlast/", 0755);

file_put_contents($folder . basename($domain), $homepage);

exec ('cwebp -q 80 ' .$maindir.'/'.$month.'/'.$rmlast.'/'.escapeshellarg($file). ' -o '.$maindir.'/'.$month.'/'.$rmlast.'/'.escapeshellarg($pathp2). '.webp');

exec ('chmod 755 ' .$maindir.'/'.$month.'/'.$rmlast. '/' .escapeshellarg($pathp2). '.webp; rm -rf ' .$maindir.'/' .$month.'/'.$rmlast. '/' .escapeshellarg($file). '');

echo "saved to <a href=\"archive/$month/$rmlast/$pathp2.webp\">$_SERVER[HTTP_HOST]/archive/$month/$pathp2/$pathp2.webp</a><br>";
echo "<img src=\"archive/$month/$rmlast/$pathp2.webp\" width=\"700px\" < />";

?>

