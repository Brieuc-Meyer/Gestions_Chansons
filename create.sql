SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `Alb_id` int(11) NOT NULL AUTO_INCREMENT,
  `Alb_idChanteur` int(11) NOT NULL,
  `Alb_annee` int(11) NOT NULL,
  `Alb_nom` varchar(20) NOT NULL,
  PRIMARY KEY (`Alb_id`),
  KEY `Album_FK1` (`Alb_idChanteur`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

INSERT INTO `album` (`Alb_id`, `Alb_idChanteur`, `Alb_annee`, `Alb_nom`) VALUES
(1, 1, 2016, 'Vianney'),
(2, 1, 2020, 'N\'attendons pas'),
(3, 3, 2020, 'À l\'aube revenant'),
(24, 1, 2022, 'xxx');

DROP TABLE IF EXISTS `chanteur`;
CREATE TABLE IF NOT EXISTS `chanteur` (
  `Cht_id` int(11) NOT NULL AUTO_INCREMENT,
  `Cht_nom` varchar(20) NOT NULL,
  `Cht_prenom` varchar(20) NOT NULL,
  PRIMARY KEY (`Cht_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

INSERT INTO `chanteur` (`Cht_id`, `Cht_nom`, `Cht_prenom`) VALUES
(1, 'VIANNEY', ''),
(3, 'CABREL', 'Francis'),
(10, 'BENABAR', '');

DROP TABLE IF EXISTS `enregistrement`;
CREATE TABLE IF NOT EXISTS `enregistrement` (
  `Enr_id` int(11) NOT NULL AUTO_INCREMENT,
  `Enr_idAlbum` int(11) NOT NULL,
  `Enr_idTitre` int(11) NOT NULL,
  `Enr_duree` int(11) NOT NULL,
  `Enr_public` tinyint(1) NOT NULL,
  PRIMARY KEY (`Enr_id`),
  KEY `Enregistrement_FK1` (`Enr_idAlbum`),
  KEY `Enregistrement_FK2` (`Enr_idTitre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `titre`;
CREATE TABLE IF NOT EXISTS `titre` (
  `Ttr_id` int(11) NOT NULL AUTO_INCREMENT,
  `Ttr_nom` varchar(20) NOT NULL,
  PRIMARY KEY (`Ttr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `album`
  ADD CONSTRAINT `FK1_Album` FOREIGN KEY (`Alb_idChanteur`) REFERENCES `chanteur` (`Cht_id`);

ALTER TABLE `enregistrement`
  ADD CONSTRAINT `FK1_Enregistrement` FOREIGN KEY (`Enr_idAlbum`) REFERENCES `album` (`Alb_id`),
  ADD CONSTRAINT `FK2_Enregistrement` FOREIGN KEY (`Enr_idTitre`) REFERENCES `titre` (`Ttr_id`);
