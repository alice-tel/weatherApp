USE `laravel`;

LOCK TABLES `companies` WRITE;
INSERT INTO `companies` VALUES (10,'Schiphol Airport','Schiphol','Aankomstpassage',1,NULL,'1118AX','NL','schiphol@schiphol.nl'),(11,'Eelde Groningen Airport','Eelde','Machlaan',14,'A','9761TK','NL','groningenAirport@eeldeairport.nl'),(12,'KNMI weerstation Eelde','Eelde','Burgemeester J.G. Legroweg',35,NULL,'9761KT','NL','knmi@eeldeairport.nl'),(13,'HSB Hochschule Bremen','Bremen','Neustadtswall',30,NULL,'28199','DE','wetter@hsb.bremen.de'),(14,'Hanze','Groningen','Zernikepark',7,NULL,'9747AK','NL','info@hanze.nl'),(15,'Rijksuniversiteit Groningen','Groningen','Broerstraat',5,NULL,'9712CP','NL','rectormag@rug.nl'),(16,'SHELL Campus Den Haag','Den Haag','Carel van Bylantlaan',16,NULL,'2596HR','NL','weerdienst@shell.nl'),(17,'Oxford University','Oxford','Wellington Square',1,NULL,'OX1 2JD','GB','weather@oxforduni.co.uk'),(18,'Hapag-LLoyd','Parijs','QUAI DU DOCTEUR DERVAUX',99,NULL,'92600','FR','transport@hplloyd.fr');
UNLOCK TABLES;
