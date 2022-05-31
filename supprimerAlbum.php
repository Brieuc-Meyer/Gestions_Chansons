<?php
try {
  require_once("modele.php");
  if (! isset ($_POST ["id"])) {
    $_SESSION ["error"]="id absent";
  } else {
    $id=$_POST ["id"];
    if (supprimerAlbum ($id)) $_SESSION ["info"]="Album supprimé";
    else $_SESSION ["error"]="Album non supprimé";
  }
}
catch (Exception $e) {
  $_SESSION ["error"]="Houston, on a un problème : " . $e->getMessage ();
}

header("location: index.php?action=albums");
?>