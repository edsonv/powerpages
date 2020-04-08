CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_activation_code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lost_password_code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_id` bigint(20) DEFAULT NULL,
  `instagram_id` bigint(20) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `package_id` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `package_expiration_date` datetime DEFAULT NULL,
  `package_settings` text COLLATE utf8_unicode_ci,
  `package_trial_done` tinyint(4) DEFAULT '0',
  `payment_subscription_id` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(32) COLLATE utf8_unicode_ci DEFAULT 'english',
  `timezone` varchar(32) DEFAULT 'UTC',
  `date` datetime DEFAULT NULL,
  `ip` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `last_user_agent` text COLLATE utf8_unicode_ci,
  `total_logins` int(11) DEFAULT '0',
  PRIMARY KEY (`user_id`),
  KEY `package_id` (`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- SEPARATOR --

INSERT INTO `users` (`user_id`, `email`, `password`, `name`, `token_code`, `email_activation_code`, `lost_password_code`, `facebook_id`, `type`, `active`, `package_id`, `package_expiration_date`, `package_settings`, `package_trial_done`, `payment_subscription_id`, `date`, `ip`, `last_activity`, `last_user_agent`, `total_logins`)
VALUES (1,'admin','$2y$10$uFNO0pQKEHSFcus1zSFlveiPCB3EvG9ZlES7XKgJFTAl5JbRGFCWy','AltumCode','','','',NULL,1,1,'free','2020-07-15 11:26:19','{\"no_ads\":false,\"removable_branding\":true,\"custom_branding\":true,\"custom_colored_links\":true,\"statistics\":true,\"google_analytics\":true,\"facebook_pixel\":true,\"custom_backgrounds\":true,\"projects_limit\":-1,\"biolinks_limit\":-1,\"links_limit\":-1,\"scheduling\":true,\"verified\":true}',1,'','2019-06-01 12:00:00','','2019-06-15 12:20:13','',0);

-- SEPARATOR --

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL DEFAULT '',
  `date` datetime NOT NULL,
  PRIMARY KEY (`project_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- SEPARATOR --

CREATE TABLE `links`  (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `biolink_id` int(11) DEFAULT NULL,
  `domain_id` int(11) NOT NULL DEFAULT '0',
  `type` varchar(32) NOT NULL DEFAULT '',
  `subtype` varchar(32) DEFAULT NULL,
  `url` varchar(256) NOT NULL DEFAULT '',
  `location_url` varchar(512) DEFAULT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `settings` text,
  `order` int(11) NOT NULL DEFAULT '0',
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `is_enabled` tinyint(4) NOT NULL DEFAULT '1',
  `date` datetime NOT NULL,
  PRIMARY KEY (`link_id`),
  KEY `project_id` (`project_id`),
  KEY `user_id` (`user_id`),
  KEY `url` (`url`),
  CONSTRAINT `links_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `links_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ROW_FORMAT=DYNAMIC ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- SEPARATOR --

CREATE TABLE `packages` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL DEFAULT '',
  `monthly_price` float NOT NULL,
  `annual_price` float NOT NULL,
  `settings` text NOT NULL,
  `is_enabled` tinyint(4) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- SEPARATOR --

CREATE TABLE `pages_categories` (
  `pages_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `icon` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pages_category_id`),
  KEY `url` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- SEPARATOR --

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `pages_category_id` int(11) DEFAULT NULL,
  `url` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `type` varchar(16) COLLATE utf8_unicode_ci DEFAULT '',
  `position` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `order` int(11) DEFAULT '0',
  `total_views` int(11) DEFAULT '0',
  `date` datetime DEFAULT NULL,
  `last_date` datetime DEFAULT NULL,
  PRIMARY KEY (`page_id`),
  KEY `pages_pages_category_id_index` (`pages_category_id`),
  KEY `pages_url_index` (`url`),
  CONSTRAINT `pages_pages_categories_pages_category_id_fk` FOREIGN KEY (`pages_category_id`) REFERENCES `pages_categories` (`pages_category_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- SEPARATOR --

CREATE TABLE `payments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `processor` enum('PAYPAL','STRIPE') DEFAULT NULL,
  `type` enum('ONE-TIME','RECURRING') DEFAULT NULL,
  `plan` varchar(16) DEFAULT NULL,
  `payment_id` varchar(64) DEFAULT NULL,
  `subscription_id` varchar(32) DEFAULT NULL,
  `payer_id` varchar(32) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `currency` varchar(4) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_user_id` (`user_id`),
  KEY `package_id` (`package_id`),
  CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `packages` (`package_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `payments_users_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- SEPARATOR --

CREATE TABLE `track_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_id` int(11) NOT NULL,
  `dynamic_id` varchar(32) NOT NULL DEFAULT '',
  `ip` varchar(128) NOT NULL DEFAULT '',
  `location` varchar(8) DEFAULT NULL,
  `os` varchar(16) DEFAULT NULL,
  `browser` varchar(32) DEFAULT NULL,
  `referer` varchar(512) DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT '1',
  `date` datetime NOT NULL,
  `last_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dynamic_id` (`dynamic_id`),
  KEY `link_id` (`link_id`),
  KEY `track_links_date_index` (`date`),
  CONSTRAINT `track_links_ibfk_1` FOREIGN KEY (`link_id`) REFERENCES `links` (`link_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ROW_FORMAT=DYNAMIC ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- SEPARATOR --

CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(64) NOT NULL DEFAULT '',
  `value` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- SEPARATOR --
SET @cron_key = MD5(RAND());
-- SEPARATOR --
SET @cron_reset_date = NOW();

-- SEPARATOR --
INSERT INTO `settings` (`key`, `value`)
VALUES
	('ads', '{\"header\":\"\",\"footer\":\"\"}'),
	('captcha', '{\"recaptcha_is_enabled\":\"0\",\"recaptcha_public_key\":\"\",\"recaptcha_private_key\":\"\"}'),
	('cron', concat('{\"key\":\"', @cron_key, '\"}')),
	('default_language', 'english'),
	('email_confirmation', '0'),
    ('register_is_enabled', '1'),
	('email_notifications', '{\"emails\":\"\",\"new_user\":\"0\",\"new_payment\":\"0\"}'),
	('facebook', '{\"is_enabled\":\"0\",\"app_id\":\"\",\"app_secret\":\"\"}'),
	('instagram', '{\"is_enabled\":\"0\",\"client_id\":\"\",\"client_secret\":\"\"}'),
	('favicon', '9fa8a623783fd2d277c53e1d216068ce.ico'),
	('logo', ''),
    ('package_custom', '{\"package_id\":\"custom\",\"name\":\"Custom\",\"is_enabled\":true}'),
	('package_free', '{\"package_id\":\"free\",\"name\":\"Free\",\"days\":null,\"is_enabled\":1,\"settings\":{\"no_ads\":true,\"removable_branding\":true,\"custom_branding\":false,\"custom_colored_links\":true,\"statistics\":true,\"google_analytics\":false,\"facebook_pixel\":false,\"custom_backgrounds\":false,\"projects_limit\":1,\"biolinks_limit\":1,\"links_limit\":10,\"scheduling\":true,\"verified\":true}}'),
	('package_trial', '{\"package_id\":\"trial\",\"name\":\"Trial\",\"days\":7,\"is_enabled\":0,\"settings\":{\"no_ads\":false,\"removable_branding\":false,\"custom_branding\":false,\"custom_colored_links\":true,\"statistics\":true,\"google_analytics\":true,\"facebook_pixel\":true,\"custom_backgrounds\":false,\"projects_limit\":1,\"biolinks_limit\":1,\"links_limit\":10,\"scheduling\":true,\"verified\":true}}'),
	('payment', '{\"is_enabled\":\"0\",\"brand_name\":\"BioLinks\",\"currency\":\"USD\"}'),
	('paypal', '{\"is_enabled\":\"0\",\"mode\":\"sandbox\",\"client_id\":\"\",\"secret\":\"\"}'),
	('smtp', '{\"host\":\"\",\"from\":\"\",\"encryption\":\"tls\",\"port\":\"587\",\"auth\":\"0\",\"username\":\"\",\"password\":\"\"}'),
	('custom', '{\"head_js\":\"\",\"head_css\":\"\"}'),
	('socials', '{\"facebook\":\"\",\"instagram\":\"\",\"twitter\":\"\",\"youtube\":\"\"}'),
	('stripe', '{\"is_enabled\":\"0\",\"publishable_key\":\"\",\"secret_key\":\"\",\"webhook_secret\":\"\"}'),
	('default_timezone', 'UTC'),
	('title', 'Biolinks'),
	('privacy_policy_url', ''),
	('terms_and_conditions_url', ''),
	('index_url', ''),
	('business', '{\"invoice_is_enabled\":\"0\",\"name\":\"\",\"address\":\"\",\"city\":\"\",\"county\":\"\",\"zip\":\"\",\"country\":\"\",\"email\":\"\",\"phone\":\"\",\"tax_type\":\"\",\"tax_id\":\"\",\"custom_key_one\":\"\",\"custom_value_one\":\"\",\"custom_key_two\":\"\",\"custom_value_two\":\"\"}'),
	('links', '{"blacklisted_domains":[""],"blacklisted_keywords":[],"phishtank_is_enabled":"0","phishtank_api_key":"","google_safe_browsing_is_enabled":"0","google_safe_browsing_api_key":""}');

-- SEPARATOR --

CREATE TABLE `users_logs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(64) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `ip` varchar(64) DEFAULT NULL,
  `public` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `users_logs_user_id` (`user_id`),
  CONSTRAINT `users_logs_users_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- SEPARATOR --

CREATE TABLE `domains` (
  `domain_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `scheme` varchar(8) NOT NULL DEFAULT '',
  `host` varchar(256) NOT NULL DEFAULT '',
  `type` tinyint(11) DEFAULT '1',
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`domain_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `domains_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
