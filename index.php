<?php
// Indicate the location of your images 
$root = '';
// use if specifying path from root
//$root = $_SERVER['DOCUMENT_ROOT'];

$path = 'images/';
 
function getImagesFromDir($path) {
  $images = array();
  if ( $img_dir = @opendir($path) ) {
    while ( false !== ($img_file = readdir($img_dir)) ) {
      // checks for gif, jpg, png and jpeg
      if ( preg_match("/(\.gif|\.jpg|\.png\.jpeg)$/", $img_file) ) {
        $images[] = $img_file;
      }
    }
    closedir($img_dir);
  }
  return $images;
}

function getRandomFromArray($ar) {
  mt_srand( (double)microtime() * 1000000 ); // php 4.2+ not needed
  $num = array_rand($ar);
  return $ar[$num];
}


// Obtain list of images from directory 
$imgList = getImagesFromDir($root . $path);
$img = getRandomFromArray($imgList);

?> 
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Riko</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.ico" />
  </head>
  <body>
	<div class="text-center"><p style="font-size:xx-large;">Press F5 for another pic!</p></div>
  <!-- image displays here -->
  <div class="pic-center">
    <img src="<?php echo $path . $img ?>" alt="" />
  </div>
  <a href="sources.php">Sources</a> | <a href="riko.zip">Download all pictures</a>

  </body>
</html>
