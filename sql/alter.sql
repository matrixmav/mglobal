 ALTER TABLE `build_temp` DROP FOREIGN KEY `build_temp_ibfk_3`; ALTER TABLE `build_temp` ADD CONSTRAINT `build_temp_ibfk_3` FOREIGN KEY (`temp_body_id`) REFERENCES `mglobal`.`build_temp_body`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION; ALTER TABLE `build_temp` DROP FOREIGN KEY `build_temp_ibfk_4`; ALTER TABLE `build_temp` ADD CONSTRAINT `build_temp_ibfk_4` FOREIGN KEY (`temp_footer_id`) REFERENCES `mglobal`.`build_temp_footer`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `build_temp` ADD `template_id` INT(11) NOT NULL AFTER `id`;