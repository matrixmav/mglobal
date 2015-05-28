ALTER TABLE `genealogy` ADD `order_status` INT(11) NOT NULL AFTER `status`, ADD `order_amount` VARCHAR(255) NOT NULL AFTER `order_status`; 

ALTER TABLE `genealogy` CHANGE `updated_at` `updated_at` DATETIME on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 

ALTER TABLE `user` ADD `unique_id` VARCHAR(255) NOT NULL AFTER `master_pin`;

ALTER TABLE `ads` ADD `banner` VARCHAR(255) NOT NULL AFTER `name`;

ALTER TABLE `ads` ADD `get_code` TEXT NOT NULL AFTER `status`;