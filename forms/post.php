<?php

$title = $_POST['title'];
$author = $_POST['author'];
$content = $_POST['content'];
$image = $_FILES['imagefile']['tmp_name'];
$image_path = "/images/".$_FILES['imagefile']['name'];
$type = $_POST['type'];

$moved = move_uploaded_file($image,"/srv/disk12/4016277/www/wsbprojektblog.atwebpages.com".$image_path);



$pol=mysqli_connect("fdb34.awardspace.net","4016277_justyna","Projekt123!","4016277_justyna") or die ('BRak połączenia z serwerem');
$pol->set_charset("utf8");

$dodaj_dane=mysqli_query($pol,"INSERT INTO posts (title,author,content, image, type) value ('$title','$author','$content', '$image_path', '$type')");

if( $moved ) {

  header("Location: http://wsbprojektblog.atwebpages.com/admin_site.html?message=Wpis dodano prawidłowo");        
} else {
  echo "Not uploaded";
}


?>