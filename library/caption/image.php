<?php
session_start();
//header("Content-type: image/png");
$im=imagecreatefromjpeg('image.jpg');
//$im=imagecreate(140, 25);

$color = imagecolorallocate($im, 108, 108, 108);

$str=rand(10000,99999);
//$rnd=$str;
//session_register('rnd');
$_SESSION['confirm_code']=$str;
imagettftext ($im, rand(24,26), 0, 1, 30, $color, "CANDYBT", $str);
imagejpeg($im);
//imagepng($im);
imagedestroy ($im);
?>