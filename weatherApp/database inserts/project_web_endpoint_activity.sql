USE `laravel`;

LOCK TABLES `endpoint_activity` WRITE;
INSERT INTO `endpoint_activity` VALUES (1,'HANZE14','IWA/abonnement/HANZE14',1,'2025-01-15','12:00:02',1,40962568),(2,'HANZE14','IWA/abonnement/HANZE14',1,'2025-01-16','09:43:23',1,40962568),(3,'HANZE14','IWA/abonnement/HANZE14',1,'2025-01-17','12:00:08',1,40962568),(4,'HANZE14','IWA/abonnement/HANZE14',2,'2025-01-19','12:00:05',1,81925136),(5,'HANZE14','IWA/abonnement/HANZE14/stations',0,'2025-02-06','10:05:41',1,16),(6,'OXFOR17','IWA/abonnement',0,'2025-02-07','01:00:05',0,0),(7,'OXFOR17','IWA/abonnement/OXFOR17',1,'2025-02-08','01:00:06',1,1281648),(8,'OXFOR17','IWA/abonnement/OXFOR17',1,'2025-02-08','02:00:06',1,1281648);
UNLOCK TABLES;
