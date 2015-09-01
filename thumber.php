<?php
include_once('easyphpthumbnail.class.php');
$domain = $_GET["th"];
$files = glob("/home/coax/public_html/art/archive/$domain/");

$thumb = new easyphpthumbnail;
$thumb -> Thumbsize = 250;
$thumb -> Chmodlevel = '0755';
$thumb -> Thumblocation = 'gfx/thumbs/';
$thumb -> Thumbsaveas = 'jpg';
$thumb -> Thumbprefix = '250px_thumb_';
if ($dir=@opendir($files)) {
  while ($filename=@readdir($dir)) {
    if (($filename!='.') && ($filename!='..') && !is_dir($filename)) {
      $extension=strtolower(substr($filename,strrpos($filename,'.')+1,strlen($filename)));
      if ($extension=='jpg' || $extension=='jpeg' || $extension=='png' || $extension=='gif') {
        // Output to file
        // You can add some custom changes for individual images here
        $thumb -> Createthumb($filename,'file');
        echo $files;
      }
    }
  }
}
?>

