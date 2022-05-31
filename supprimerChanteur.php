<?php
try {
  require_once("modele.php");
  if (! isset ($_POST ["id"])) {
    $_SESSION ["error"]="id absent";
  } else {
    $id=$_POST ["id"];
    if (supprimerChanteur ($id)) $_SESSION ["info"]="Chanteur supprimé";
    else $_SESSION ["error"]="Chanteur non supprimé";
  }
}
catch (Exception $e) {
  $_SESSION ["error"]="Houston, on a un problème : " . $e->getMessage ();
}

header("location: index.php?action=chanteurs");
?>