<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chanteurs</title>
</head>
<body>
  <div>
    <span style="background-color: #DDF">&nbsp;Chanteurs&nbsp;</span>
    &nbsp;<a href="index.php?action=albums">Albums</a>&nbsp;
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

<?php
try {
  $chanteurs = lireChanteurs ();

  foreach ($chanteurs as $chanteur) {
?>

  <div style="display:flex">
    <form action="index.php?action=modifierChanteur" method="post">
      <input name="id" value="<?php echo ($chanteur ["Cht_id"]);?>" type="hidden" />
      Nom <input name="nom" value="<?php echo ($chanteur ["Cht_nom"]);?>" />
      Prénom <input name="prenom" value="<?php echo ($chanteur ["Cht_prenom"]);?>" />
      &nbsp;&nbsp;&nbsp;
      <input type="submit" value="Modifier" />
    </form>
    &nbsp;
    <form action="index.php?action=supprimerChanteur" method="post">
      <input name="id" value="<?php echo ($chanteur ["Cht_id"]);?>" type="hidden" />
      <input type="submit" value="Supprimer" />
    </form>
    &nbsp;&nbsp;&nbsp;
    <form action="index.php?action=filtrerAlbum" method="post">
      <input name="idChanteur" value="<?php echo ($chanteur ["Cht_id"]);?>" type="hidden" />
      <input type="submit" value="Albums ..." />
    </form>
  </div>

<?php } // ForEach ?>

  <h3>Ajout</h3>

  <form action="index.php?action=ajouterChanteur" method="post">
    Nom <input name="nom" />
    Prénom <input name="prenom" />
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