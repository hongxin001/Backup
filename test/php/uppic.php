<?php
include "mysql.php";
ses_start();
  if($_FILES["pic"]["error"]>0)
  {
    exit("0");
  }
  else if($_FILES["pic"]["size"]/1024>1024)
  {
    exit("2");
  }
  else if($_FILES["pic"]["type"]!="image/png"&&$_FILES["pic"]["type"]!="image/jpeg")
  {
    exit("3");
  }
  else 
  {
    if($_FILES["pic"]["type"]=="image/jpeg")
    {
    $picname = $_SESSION[username].'.jpg';
    $newname='../pic/'.$picname;
    move_uploaded_file($_FILES["pic"]["tmp_name"],$newname);
    list($width, $height) = getimagesize($newname);
    $w = $width;
    $h = $height;
    if($h>400)
    {
      $h = 400;
      $w = $w*400/$h;

    }
    if($w>600)
    {
      $w = 600;
      $h = $h*600/$w;
    }
    $image_p = imagecreatetruecolor($w, $h);
    $image = imagecreatefromjpeg($newname);
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $w,$h, $width, $height);
    imagejpeg($image_p,$newname);
    }

    if($_FILES["pic"]["type"]=="image/png")
    {
    $picname = $_SESSION[username].'.jpg';
    $newname='../pic/'.$picname;
    move_uploaded_file($_FILES["pic"]["tmp_name"],$newname);
    list($width, $height) = getimagesize($newname);
    $w = $width;
    $h = $height;
    if($h>400)
    {
      $h = 400;
      $w = $w*400/$h;
    }
    if($w>600)
    {
      $w = 600;
      $h = $h*600/$w;
    }
    $image_p = imagecreatetruecolor($w, $h);
    $image = imagecreatefrompng($newname);
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $w,$h, $width, $height);
    imagejpeg($image_p,$newname);
    }
    echo "1";
  }
?>