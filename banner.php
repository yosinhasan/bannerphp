<?php
header("Content-Type: image/jpeg");
$img=imagecreatefromjpeg("images/default.jpg");
imagejpeg($img);
//include "process.php";
?>