<?php

$pol=mysqli_connect("fdb34.awardspace.net","4016277_justyna","Projekt123!","4016277_justyna") or die ('Brak połączenia z serwerem');
$pol->set_charset("utf8");
$sql = "DELETE FROM posts WHERE id='" . $_GET["userid"] . "'";
if (mysqli_query($pol, $sql)) {
header("Location: http://wsbprojektblog.atwebpages.com/admin_site.html?message=Wpis usunięty prawidłowo"); 
} else {
    echo "Error deleting record: " . mysqli_error($pol);
}
mysqli_close($pol);
?>