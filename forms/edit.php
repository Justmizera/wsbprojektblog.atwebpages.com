<?php

$title = $_POST['title'];
$author = $_POST['author'];
$content = $_POST['content'];
$type = $_POST['type'];

$pol=mysqli_connect("fdb34.awardspace.net","4016277_justyna","Projekt123!","4016277_justyna") or die ('Brak połączenia z serwerem');
$pol->set_charset("utf8");
$id = $_GET["userid"];
$edit=mysqli_query($pol,"UPDATE posts SET title = '$title', author = '$author', content = '$content', type = '$type' WHERE posts.id='$id'");
if ($edit) {
header("Location: http://wsbprojektblog.atwebpages.com/admin_site.html?message=Wpis zmieniony prawidłowo");
} else {
    echo "Error deleting record: " . mysqli_error($pol);
}
mysqli_close($pol);


?>