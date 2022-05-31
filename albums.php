<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Albums</title>
</head>
<body>
  <div>
    &nbsp;<a href="index.php?action=chanteurs">Chanteurs</a>&nbsp;
    <span style="background-color: #DDF" >&nbsp;Albums&nbsp;</span>
  </div>

<?php
require_once("modele.php");
if (isset ($_SESSION ["error"]) && ($_SESSION ["error"]!=""))
echo ("<br/><div style=\"background-color: #f44; padding: 6px;\">" . ($_SESSION ["error"]) . "</div>");
$_SESSION ["error"]="";

if (isset ($_SESSION ["info"]) && ($_SESSION ["info"]!=""))
echo ("<br/><div style=\"background-color: #4f4; padding: 6px;\">" . ($_SESSION ["info"]) . "</div>");
$_SESSION ["info"]="";
?>

<br/><br/>
  <form id="filtre" action="index.php?action=filtrerAlbum" method="post">
    <b>Filtre :</b>
    Chanteur <select name="idChanteur" onchange="filtre.submit()">
      <option value="0" selected>Tous</option>

<?php
  $chanteurs = lireChanteurs();

// Prise en compte du filtrage éventuel :
  $filtreIdChanteur = "0";
  if (isset ($_SESSION ["filtreIdChanteur"]) && $_SESSION ["filtreIdChanteur"]!="0") {
    $filtreIdChanteur = $_SESSION ["filtreIdChanteur"];
    $albums = lireAlbumsDeChanteur ($filtreIdChanteur);
  } else $albums = lireAlbums ();

  foreach ($chanteurs as $chanteur) {
    $id = $chanteur ["Cht_id"];
    $nomPrenom = $chanteur ["Cht_nom"] . " " . $chanteur ["Cht_prenom"];
    $selected = "";
    if ($filtreIdChanteur==$id) $selected="selected";
    echo ("<option value=\"$id\" $selected>$nomPrenom</option>\n");
  }
?>

    </select>
  </form>

  <br/><br/>

<?php
try {
  foreach ($albums as $album) {
?>

  <div style="display:flex">  
    <form action="index.php?action=modifierAlbum" method="post">
      <input name="id" value="<?php echo ($album ["Alb_id"]);?>" type="hidden" />
      Nom <input name="nom" value="<?php echo ($album ["Alb_nom"]);?>" />
      Année <input name="annee" value="<?php echo ($album ["Alb_annee"]);?>" />
      Chanteur <select name="chanteur">

<?php
    foreach ($chanteurs as $chanteur) {
      $id = $chanteur ["Cht_id"];
      $nomPrenom = $chanteur ["Cht_nom"] . " " . $chanteur ["Cht_prenom"];
      $selected = "";
      if ($id==$album ["Alb_idChanteur"]) $selected="selected";
      echo ("<option value=\"$id\" $selected>$nomPrenom</option>\n");
    }
?>

      </select>
      &nbsp;&nbsp;&nbsp;
      <input type="submit" value="Modifier" />
    </form>
    &nbsp;
    <form action="index.php?action=supprimerAlbum" method="post">
      <input name="id" value="<?php echo ($album ["Alb_id"]);?>" type="hidden" />
      <input type="submit" value="Supprimer" />
    </form>
    &nbsp;&nbsp;&nbsp;
    <form action="index.php?action=filtrerEnregistrement" method="post">
      <input name="idAlbum" value="<?php echo ($album ["Alb_id"]);?>" type="hidden" />
      <input type="submit" value="Enregistrements ..." />
    </form>
  </div>

<?php } // ForEach ?>

  <h3>Ajout</h3>

  <form action="index.php?action=ajouterAlbum" method="post">
    Nom <input name="nom" />
    Année <input name="annee" />
    Chanteur <select name="chanteur">

<?php
    foreach ($chanteurs as $chanteur) {
      $id = $chanteur ["Cht_id"];
      $nomPrenom = $chanteur ["Cht_nom"] . " " . $chanteur ["Cht_prenom"];
      $selected = "";
      if ($filtreIdChanteur==$id) $selected="selected";
      echo ("<option value=\"$id\" $selected>$nomPrenom</option>\n");
    }
?>

    </select>
    &nbsp;&nbsp;&nbsp;
    <input type="submit" value="Ajouter" />
  </form>

<?php
}
catch (Exception $e) {
  die ("Houston, on a un problème : " . $e->getMessage ());
}
?>

  </body>
</html>