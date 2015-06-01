ALTER TABLE `build_temp` DROP FOREIGN KEY `build_temp_ibfk_3`; ALTER TABLE `build_temp` ADD CONSTRAINT `build_temp_ibfk_3` FOREIGN KEY (`temp_body_id`) REFERENCES `mglobal`.`build_temp_body`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION; ALTER TABLE `build_temp` DROP FOREIGN KEY `build_temp_ibfk_4`; ALTER TABLE `build_temp` ADD CONSTRAINT `build_temp_ibfk_4` FOREIGN KEY (`temp_footer_id`) REFERENCES `mglobal`.`build_temp_footer`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;


ALTER TABLE `build_temp` ADD `template_id` INT(11) NOT NULL AFTER `id`;
ALTER TABLE `genealogy` ADD `order_status` INT(11) NOT NULL AFTER `status`, ADD `order_amount` VARCHAR(255) NOT NULL AFTER `order_status`; 

ALTER TABLE `genealogy` CHANGE `updated_at` `updated_at` DATETIME on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 

ALTER TABLE `user` ADD `unique_id` VARCHAR(255) NOT NULL AFTER `master_pin`;

ALTER TABLE `ads` ADD `banner` VARCHAR(255) NOT NULL AFTER `name`;

ALTER TABLE `ads` ADD `get_code` TEXT NOT NULL AFTER `status`;


Date 01-06-2015

ALTER TABLE `user_has_template` ADD `copyright` VARCHAR(255) NOT NULL AFTER `contact_email`;
