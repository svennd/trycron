<?php

/**

-- id
CREATE TABLE `ping` (
  `hash` varchar(255) DEFAULT NULL,
  `descr` text DEFAULT NULL,
  `cron_code` text DEFAULT NULL,
  `expected_result` text DEFAULT NULL,
  `count` text DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`hash`)
) ENGINE=InnoDB;

-- log
CREATE TABLE `ping_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

**/

?>