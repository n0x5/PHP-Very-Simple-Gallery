<?php
require_once 'head3.php';
echo '<div id="photos">';

<h2>Latest 6 images...</h2>
<?php

$month1 = date("F");
$month2 = date("Y");
$month = "$month1 $month2";
$folder = "archive/$month";

$files = glob("/home/your/gallery/$folder/*");
array_multisort(array_map('filemtime', $files), SORT_DESC, $files);
$files2 = array_slice($files, 0, 6);


foreach($files2 as $file) {
    $file2 = basename($file);
    if (basename($file) == "index.html") { continue; }
      echo "<a href=\"/realtime/$folder/$file2\" target=\"_blank\"><img class=\"latest5img\" src=\"/realtime/$folder/$file2\" width=\"100px\" alt=\"$file2\" title=\"$file2\" /></a>";
}
?>
</div>
<h2>Archive of months</h2>




$files = glob("archive/*");

array_multisort(
array_map( 'filemtime', $files ),
SORT_NUMERIC,
SORT_DESC,
$files
);

$count = count($files);
echo "<p>Items: $count</p>";
foreach($files as $file) {
    $file2 = basename($file);
    $ftime = date ("F d Y H:i:s.", filemtime($file));
    if (basename($file) == "index.html") { continue; }
echo "<div class=\"imgbox\"><div class=\"ftime\">$ftime</div><a href=\"archive/$file2\" target=\"_blank\"><img src=\"phpThumb.php?src=/archive/$file2&amp;w=250&amp;h=250&amp;far=C&amp;bg=000000\" alt=\"$file2\" title=\"$file2\"></a></div>";
}
?>
</div>
</body>
</html>
