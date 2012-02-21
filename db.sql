SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE IF NOT EXISTS `Persons` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,  
  `LastName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Status` varchar(50)  CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PersonId` int(11) NOT NULL,
  `CercleId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  FOREIGN KEY (`PersonId`) REFERENCES Persons(`Id`),
  FOREIGN KEY (`CercleId`) REFERENCES Cercles(`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Cercles` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,  
  `Description` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `LogoLink` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `WebsiteUrl` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Articles` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Body` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `AuthorId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  FOREIGN KEY (`AuthorId`) REFERENCES Users(`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `News` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ArticleId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  FOREIGN KEY (`ArticleId`) REFERENCES Articles(`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
