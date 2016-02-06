<?php
//define('WP_USE_THEMES', true);
//require('/home/wp/wp-blog-header.php');
?>


<?php
require_once 'head3.php';
echo '<div id="photos">';
$domain = $_GET["which"];
$domain4 = $_GET["which2"];
$domain2 = rawurlencode($domain);
$domain3 = rawurlencode($domain4);
$files = glob("archive/$domain/$domain4/*");

array_multisort(
array_map( 'filemtime', $files ),
SORT_NUMERIC,
SORT_DESC,
$files
);

$count = count($files);
echo "<title>$domain $count images</title>";
echo "<p>Gallery: $domain4, items: $count</p>";
foreach($files as $file) {
    $file2 = rawurlencode(basename($file));
    $file3 = rawurlencode($file);
    $path_parts = rawurlencode(pathinfo($file));
    $pathp2 = rawurlencode($path_parts['filename']);
    $ftime = date ("F d Y H:i:s", filemtime($file));
    if (basename($file) == "index.html") { continue; }
      list($width, $height) = getimagesize("$file");
      echo "<div class=\"imgbox\"><div class=\"ftime\">$ftime</div><a href=\"archive/$domain/$domain3/$file2\" target=\"_blank\"><img src=\"phpThumb.php?src=/archive/$domain2/$domain3/$pathp22/$file2&amp;w=250&amp;h=250&amp;far=C&amp;bg=ffffff\" height=\"250\" alt=\"$file2\" title=\"$file2\"></a><div class=\"dimension2\">$width x $height</div> </div>";

}
?>
</div>
</body>
</html>
