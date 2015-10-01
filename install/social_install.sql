CREATE TABLE IF NOT EXISTS `social_icons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `target` enum('blank','self','parent') DEFAULT 'blank',
  `icon` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `precedence` int(11) NOT NULL DEFAULT '0',
  `published` enum('yes','no') DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `fuel_permissions` (`id`, `description`, `name`, `active`)
VALUES
	(NULL, 'Social Icons', 'social_icons', 'yes'),
	(NULL, 'Social Icons: Create', 'social_icons/create', 'yes'),
	(NULL, 'Social Icons: Delete', 'social_icons/delete', 'yes'),
	(NULL, 'Social Icons: Edit', 'social_icons/edit', 'yes'),
	(NULL, 'Social Icons: Publish', 'social_icons/publish', 'yes');
