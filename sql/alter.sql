Date 04-06-2015

ALTER TABLE `build_temp` ADD `custom_css` TEXT NOT NULL AFTER `screenshot`, ADD `custom_js` TEXT NOT NULL AFTER `custom_css`;

ALTER TABLE `user_has_template` ADD `copyright` VARCHAR(255) NOT NULL AFTER `contact_email`;

ALTER TABLE `user_has_template` ADD `custom_css` TEXT NOT NULL AFTER `copyright`, ADD `custom_js` TEXT NOT NULL AFTER `custom_css`;

ALTER TABLE `user_has_template` ADD `site_title` VARCHAR(255) NOT NULL AFTER `logo`;


ALTER TABLE `build_temp_header` ADD `menu` TEXT NOT NULL AFTER `header_content`;

ALTER TABLE `user_has_template` ADD `user_menu` TEXT NOT NULL AFTER `user_id`;


ALTER TABLE `user_has_template` ADD `logo_height` VARCHAR(11) NOT NULL AFTER `custom_js`, ADD `logo_width` VARCHAR(11) NOT NULL AFTER `logo_height`, ADD `contact_form` TEXT NOT NULL AFTER `logo_width`;


Date 05-06-2015

ALTER TABLE `build_temp` ADD `contact_form` TEXT NOT NULL AFTER `custom_js`;