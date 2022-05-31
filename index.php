<?php
session_start();
require_once ("modele.php");

if (isset ($_GET ["action"])) $action=$_GET ["action"];
else $action="chanteurs";

switch ($action) {
  case "ajouterChanteur": {
    require ("ajouterChanteur.php");  // Intégrer les anciens scripts (pour l'instant)
    break;
  }
  case "ajouterAlbum": {
    require ("ajouterAlbum.php");
    break;
  }
  case "modifierChanteur": {
    require ("modifierChanteur.php");
    break;
  }
  case "modifierAlbum": {
    require ("modifierAlbum.php");
    break;
  }
  case "supprimerChanteur": {
    require ("supprimerChanteur.php");
    break;
  }
  case "supprimerAlbum": {
    require ("supprimerAlbum.php");
    break;
  }
  case "chanteurs": {
    require ("chanteurs.php");
    break;
  }
  case "albums": {
    require ("albums.php");
    break;
  }
  case "filtrerAlbum": {
    require ("filtrerAlbum.php");
    break;
  }
  default:  die ("Action non gérée : $action");
}
?>
