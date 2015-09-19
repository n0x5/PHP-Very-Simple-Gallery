<?php
require_once 'head3.php';
echo '<div id="photos">';
$domain = $_GET["which"];
$files = glob("archive/$domain/*");

array_multisort(
array_map( 'filemtime', $files ),
SORT_NUMERIC,
SORT_DESC,
$files
);

$count = count($files);
echo "<title>$domain $count images</title>";
echo "<p>Gallery: $domain, items: $count</p>";
foreach($files as $file) {
    $file2 = basename($file);
    $path_parts = pathinfo($file);
    $pathp2 = $path_parts['filename'];
    $ftime = date ("F d Y H:i:s", filemtime($file));
    if (basename($file) == "index.html") { continue; }
      echo "<div class=\"imgbox\"><div class=\"ftime\">$ftime</div><a href=\"archive/$domain/$file2\" target=\"_blank\"><img src=\"archive/$domain/$file2\" height=\"250\" alt=\"$file2\" title=\"$file2\"></a></div>";

}
?>
</div>
</body>
</html>
