<?php
function connexion() {
  return new PDO("mysql:host=localhost;dbname=albums;charset=utf8","root","root");
}

function ajouterAlbum ($nom,$annee,$chanteur) {
  $pdo = connexion();
  $req = $pdo->prepare("insert into album (Alb_nom,Alb_annee,Alb_idChanteur) values (:nom,:annee,:chanteur)");
  $req->bindParam ("nom",$nom,PDO::PARAM_STR,20);
  $req->bindParam ("annee",$annee,PDO::PARAM_INT);
  $req->bindParam ("chanteur",$chanteur,PDO::PARAM_INT);
  $req->execute();
}

function ajouterChanteur ($nom,$prenom) {
  $pdo = connexion();
  $req = $pdo->prepare("insert into chanteur (Cht_nom,Cht_prenom) values (:nom,:prenom)");
  $req->bindParam ("nom",$nom,PDO::PARAM_STR,20);
  $req->bindParam ("prenom",$prenom,PDO::PARAM_STR,20);
  $req->execute();
}

function modifierAlbum ($id,$nom,$annee,$chanteur) {
  $pdo = connexion();
  $req = $pdo->prepare("update album set Alb_nom=:nom,Alb_annee=:annee,Alb_idChanteur=:chanteur where Alb_id=:id");
  $req->bindParam ("id",$id,PDO::PARAM_INT);
  $req->bindParam ("nom",$nom,PDO::PARAM_STR,20);
  $req->bindParam ("annee",$annee,PDO::PARAM_INT);
  $req->bindParam ("chanteur",$chanteur,PDO::PARAM_INT);
  $req->execute();
}

function modifierChanteur ($id,$nom,$prenom) {
  $pdo = connexion();
  $req = $pdo->prepare("update chanteur set Cht_nom=:nom,Cht_prenom=:prenom where Cht_id=:id");
  $req->bindParam ("id",$id,PDO::PARAM_INT);
  $req->bindParam ("nom",$nom,PDO::PARAM_STR,20);
  $req->bindParam ("prenom",$prenom,PDO::PARAM_STR,20);
  $req->execute();
}

function supprimerAlbum ($id) {
  $pdo = connexion();
  $req = $pdo->prepare("delete from album where Alb_id=:id");
  $req->bindParam ("id",$id,PDO::PARAM_INT);
  $req->execute();
  return ($req->rowCount()>0); // Vrai si suppression ok
}

function supprimerChanteur ($id) {
  $pdo = connexion();
  $req = $pdo->prepare("delete from chanteur where Cht_id=:id");
  $req->bindParam ("id",$id,PDO::PARAM_INT);
  $req->execute();  
  return ($req->rowCount()>0); // Vrai si suppression ok
}

function lireAlbums () {
  $pdo = connexion();
  $res = $pdo->query("select * from album order by Alb_nom");
  return $res->fetchAll ();
}

function lireAlbumsDeChanteur ($idChanteur) {
  $pdo = connexion();
  $res = $pdo->prepare("select * from album where Alb_idChanteur=:idChanteur order by Alb_nom");
  $res->bindParam (":idChanteur",$idChanteur,PDO::PARAM_STR);
  $res->execute();
  return $res->fetchAll ();
}

function lireChanteurs () {
  $pdo = connexion();
  $res = $pdo->query("select * from chanteur order by Cht_nom");
  return $res->fetchAll ();
}?>