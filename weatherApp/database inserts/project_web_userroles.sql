USE `laravel`;

LOCK TABLES `userroles` WRITE;

INSERT INTO `userroles` VALUES (1,'Technisch medewerker','Medewerker van de afdeling monitoring en beheer'),(2,'Technisch onderzoeker','Medewerker van de afdeling analyse en datamining'),(3,'Commercieel medewerker','Medewerker van de afdeling marketing en klant beheer'),(4,'Administratief medewerker','Medewerker van de afdeling personeelszaken'),(5,'Technisch beheerder','Medewerker van de afdeling IT-support'),(6,'Administrator','Super user');

UNLOCK TABLES;
