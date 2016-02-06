?>


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
    $file2 = urlencode(basename($file));
    $path_parts = pathinfo($file);
    $pathp2 = $path_parts['filename'];
    $ftime = date ("F d Y", filemtime($file));

    $files11 = glob("archive/$domain/$file2/*");
    array_multisort(array_map('filemtime', $files11), SORT_DESC, $files11);
    $files2 = array_slice($files11, 0, 1);
    foreach($files2 as $file) {
        $file2 = basename($file);
        $path_parts1 = pathinfo($file);
        $pathp21 = $path_parts['filename'];

    }

echo "<div class=\"imgbox\"><div class=\"ftime\">$pathp21</div><a href=\"archcon2.php?which=$domain/$pathp21\" target=\"_blank\"><img src=\"phpThumb.php?src=/archive/$domain/$pathp21/$file2&amp;w=250&amp;h=250&amp;far=C&amp;bg=ffffff\" height=\"250\" alt=\"$file2\" title=\"$file2\"></a></div>";
}
?>
</div>
</body>
</html>
