<?php
try {
  require_once("modele.php");
  if (! isset ($_POST ["nom"]) || ! isset ($_POST ["annee"]) || ! isset ($_POST ["chanteur"])) {
    $_SESSION ["error"]="nom, année ou chanteur absent";
  } else {
    $nom=trim ($_POST ["nom"]);
    $annee=trim ($_POST ["annee"]);
    $chanteur=trim ($_POST ["chanteur"]);
    if ($nom=="" || $annee=="" || $chanteur=="") {
      $_SESSION ["error"]="nom, année ou chanteur non renseigné";
    } else {
      ajouterAlbum ($nom,$annee,$chanteur);
      $_SESSION ["info"]="Album ajouté";  
    }
  }
}
catch (Exception $e) {
  $_SESSION ["error"]="Houston, on a un problème : " . $e->getMessage ();
}

header("location: index.php?action=albums");
?>