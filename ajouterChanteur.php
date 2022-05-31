<?php
try {
  require_once("modele.php");
  if (! isset ($_POST ["nom"]) || ! isset ($_POST ["prenom"])) {
    $_SESSION ["error"]="nom ou prénom absent";
  } else {
    $nom=trim ($_POST ["nom"]);
    $prenom=trim ($_POST ["prenom"]);
    if ($nom=="") {
      $_SESSION ["error"]="nom non renseigné";
    } else {
      ajouterChanteur ($nom,$prenom);
      $_SESSION ["info"]="Chanteur ajouté";
    }
  }
}
catch (Exception $e) {
  $_SESSION ["error"]="Houston, on a un problème : " . $e->getMessage ();
}

header("location: index.php?action=chanteurs");
?>