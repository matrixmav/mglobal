ALTER TABLE `genealogy` ADD `order_status` INT(11) NOT NULL AFTER `status`, ADD `order_amount` VARCHAR(255) NOT NULL AFTER `order_status`; 

ALTER TABLE `genealogy` CHANGE `updated_at` `updated_at` DATETIME on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 