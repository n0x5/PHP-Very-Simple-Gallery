<link rel="stylesheet" href="style.css" type="text/css">
<?php
function clean($string) {
   $string = str_replace(' ', '-', $string); 

    return preg_replace('/[%()]/', '', $string);
}
$month1 = date("F");
$month2 = date("Y");
$month = "$month1$month2";
$domain = $_GET["i"];
$encodedUrl = urlencode($domain);
$domain2 = str_replace(['%2F', '%3A'], ['/', ':'], $encodedUrl);
$homepage = file_get_contents($domain2);
$file = basename($domain2);
$file33 = clean($file);
$path_parts = pathinfo($file);
    $pathp3 = $path_parts['filename'];
    $pathp2 = clean($pathp3);
$rmlast = substr($pathp2, 0, -2);
$rmlast2 = urlencode($rmlast);
$rmlast3 = clean($rmlast2);
$folder = "./archive/$month/$rmlast3/";
$maindir = "/home/your/jpg/archive";
if (!file_exists("$folder")) {
    mkdir("$maindir/$month/$rmlast3/", 0755, true);
}
chmod("$maindir/$month/$rmlast3/", 0755);
$domain4 = basename($domain2);
$domain5 = clean($domain4);
file_put_contents($folder . $domain5, $homepage);

exec ('chmod 755 ' .$maindir.'/'.$month.'/'.$rmlast3. '/' .escapeshellarg($file33). '');
exec ('chmod 755 ' .$maindir.'/'.$month.'/'.$rmlast3. '');
exec ('chmod 755 ' .$maindir.'/'.$month. '');

echo "saved to <a href=\"archive/$month/$rmlast3/$file33\">$_SERVER[HTTP_HOST]/archive/$month/$pathp2/$file33</a><br>";
echo "<img src=\"archive/$month/$rmlast3/$file33\" width=\"700px\" < />";
?>

