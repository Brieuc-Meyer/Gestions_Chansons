<?php
try {
  require_once("modele.php");
  if (! isset ($_POST ["id"]) || ! isset ($_POST ["nom"]) || ! isset ($_POST ["prenom"])) {
    $_SESSION ["error"]="id, nom ou prénom absent";
  } else {
    $id=$_POST ["id"];
    $nom=trim ($_POST ["nom"]);
    $prenom=trim ($_POST ["prenom"]);
    if ($nom=="") {
      $_SESSION ["error"]="nom non renseigné";
    } else {
      modifierChanteur ($id,$nom,$prenom);
      $_SESSION ["info"]="Chanteur modifié";
    }
  }
}
catch (Exception $e) {
  $_SESSION ["error"]="Houston, on a un problème : " . $e->getMessage ();
}

header("location: index.php?action=chanteurs");
?>