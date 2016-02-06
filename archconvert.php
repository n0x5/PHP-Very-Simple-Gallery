<?php
//define('WP_USE_THEMES', true);
//require('/home/wp/wp-blog-header.php');
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
    $file2 = basename($file);
    $file3 = rawurlencode($file2);
    $path_parts = pathinfo($file);
    $pathp2 = rawurlencode($path_parts['filename']);
    $ftime = date ("F d Y", filemtime($file));

    $files11 = glob("archive/$domain/$file2/*");
    array_multisort(array_map('filemtime', $files11), SORT_DESC, $files11);
    $files2 = array_slice($files11, 0, 1);
    foreach($files2 as $file1) {
        $file4 = rawurlencode(basename($file1));
        $path_parts1 = pathinfo($file1);
        $pathp21 = rawurlencode($path_parts['filename']);
        $pathp22 = $path_parts1['dirname'];
        $file55 = rawurlencode($file1);
    }

echo "<div class=\"imgbox\"><div class=\"ftime\">$pathp22</div><a href=\"archcon2.php?which=/$domain/$file3\" target=\"_blank\"><img src=\"phpThumb.php?src=/$file55&amp;w=250&amp;h=250&amp;far=C&amp;bg=ffffff\" height=\"250\" alt=\"$file2\" title=\"$file2\"></a></div>";     
}
?>
</div>
</body>
</html>
