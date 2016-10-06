<?php

$sourceImg='1.jpeg';
$thumbWidth=200;
$thumbHeight=200;
$original=imagecreatefromjpeg($sourceImg);
$dims=getimagesize($sourceImg);
$thumb=imagecreatetruecolor($thumbWidth,$thumbHeight);
imagecopyresampled($thumb,$original,0,0,0,0,$thumbWidth,$thumbHeight,$dims[0],$dims[1]);
header("Content-type: image/jpeg");
imagejpeg($thumb);



