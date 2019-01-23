<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-01-23 08:08:14 --> Severity: error --> Exception: Unable to locate the model you have specified: Tournament_type_m C:\xampp7\htdocs\project-hao\tenis\tennis\system\core\Loader.php 348
ERROR - 2019-01-23 08:09:37 --> Severity: error --> Exception: Unable to locate the model you have specified: Tournament_type_m C:\xampp7\htdocs\project-hao\tenis\tennis\system\core\Loader.php 348
ERROR - 2019-01-23 08:09:39 --> Severity: error --> Exception: Unable to locate the model you have specified: Tournament_type_m C:\xampp7\htdocs\project-hao\tenis\tennis\system\core\Loader.php 348
ERROR - 2019-01-23 08:10:00 --> Severity: error --> Exception: Unable to locate the model you have specified: Tournament_type_m C:\xampp7\htdocs\project-hao\tenis\tennis\system\core\Loader.php 348
ERROR - 2019-01-23 08:10:46 --> Severity: error --> Exception: Unable to locate the model you have specified: Tournament_type_m C:\xampp7\htdocs\project-hao\tenis\tennis\system\core\Loader.php 348
ERROR - 2019-01-23 08:13:24 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `tournament`
WHERE `pid` = '2'
AND `status` = 1
ORDER BY `position` ASC
ERROR - 2019-01-23 08:13:24 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 196
ERROR - 2019-01-23 09:21:29 --> Query error: Unknown column 'code' in 'field list' - Invalid query: INSERT INTO `tournament` (`pid`, `vn_name`, `vn_slug`, `vn_keyword`, `vn_title`, `vn_description`, `code`, `vn_sapo`, `vn_detail`, `image_link`, `image_list`, `status`, `created`) VALUES ('1', 'Úc mở rộng 2018', 'uc-mo-rong-2018', 'Úc mở rộng 2018', 'Úc mở rộng 2018', '', NULL, '', '', NULL, NULL, '1', 1548210089)
ERROR - 2019-01-23 11:05:45 --> Query error: Unknown column 'start_end' in 'field list' - Invalid query: INSERT INTO `tournament` (`pid`, `vn_name`, `vn_slug`, `vn_keyword`, `vn_title`, `vn_description`, `vn_sapo`, `vn_detail`, `image_link`, `image_list`, `start_date`, `start_end`, `status`, `created`) VALUES ('1', 'Úc mở rộng 2017', 'uc-mo-rong-2017', 'Úc mở rộng 2017', 'Úc mở rộng 2017', 'Úc mở rộng 2017', '<p>Úc mở rộng 2017</p>\r\n', '<p>Úc mở rộng 2017</p>\r\n', NULL, NULL, '2017-04-01', '2017-04-15', '1', 1548216345)
ERROR - 2019-01-23 11:06:16 --> Query error: Unknown column 'start_end' in 'field list' - Invalid query: INSERT INTO `tournament` (`pid`, `vn_name`, `vn_slug`, `vn_keyword`, `vn_title`, `vn_description`, `vn_sapo`, `vn_detail`, `image_link`, `image_list`, `start_date`, `start_end`, `status`, `created`) VALUES ('2', 'Nội thất Ý Segis', 'noi-that-y-segis', '', '', '', '', '', NULL, NULL, '2019-01-05', '2019-01-10', '1', 1548216376)
ERROR - 2019-01-23 11:06:59 --> Query error: Unknown column 'start_end' in 'field list' - Invalid query: INSERT INTO `tournament` (`pid`, `vn_name`, `vn_slug`, `vn_keyword`, `vn_title`, `vn_description`, `vn_sapo`, `vn_detail`, `image_link`, `image_list`, `start_date`, `start_end`, `status`, `created`) VALUES ('2', 'Nội thất Ý Segis', 'noi-that-y-segis', '', '', '', '', '', NULL, NULL, '2019-01-11', '2019-01-20', '1', 1548216419)
ERROR - 2019-01-23 11:29:04 --> Severity: error --> Exception: Call to undefined method Tournament_m::getId() C:\xampp7\htdocs\project-hao\tenis\tennis\application\controllers\admincp\tournament\Tournament.php 399
ERROR - 2019-01-23 11:30:33 --> Severity: error --> Exception: Call to undefined method Tournament_m::getId() C:\xampp7\htdocs\project-hao\tenis\tennis\application\controllers\admincp\tournament\Tournament.php 400
ERROR - 2019-01-23 11:31:27 --> Severity: error --> Exception: Call to undefined method Tournament_m::getId() C:\xampp7\htdocs\project-hao\tenis\tennis\application\controllers\admincp\tournament\Tournament.php 400
ERROR - 2019-01-23 11:31:28 --> Severity: error --> Exception: Call to undefined method Tournament_m::getId() C:\xampp7\htdocs\project-hao\tenis\tennis\application\controllers\admincp\tournament\Tournament.php 400
ERROR - 2019-01-23 11:31:28 --> Severity: error --> Exception: Call to undefined method Tournament_m::getId() C:\xampp7\htdocs\project-hao\tenis\tennis\application\controllers\admincp\tournament\Tournament.php 400
ERROR - 2019-01-23 13:25:33 --> Query error: Table 'tenis_new.email_register' doesn't exist - Invalid query: SELECT *
FROM `email_register`
ORDER BY `email_register`.`id` DESC
ERROR - 2019-01-23 13:25:33 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 153
ERROR - 2019-01-23 13:51:38 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 13:51:38 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 13:54:01 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 13:54:01 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 14:00:45 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 14:00:45 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 14:03:04 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 14:03:04 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 14:03:18 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 14:03:18 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 14:03:33 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 14:03:33 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 14:05:14 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 14:05:14 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 14:05:15 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 14:05:15 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 14:05:40 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 14:05:40 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 14:06:05 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 14:06:05 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 14:06:14 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 14:06:14 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 14:06:21 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 14:06:21 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 14:06:29 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 14:06:29 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 14:07:12 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 14:07:12 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 14:09:03 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 14:09:03 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 14:09:18 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 14:09:18 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 14:11:13 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 14:11:13 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 14:11:30 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 14:11:30 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 14:12:02 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 14:12:02 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 14:12:31 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 14:12:31 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 14:13:03 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 14:13:03 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 14:13:25 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 14:13:25 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 14:13:36 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 14:13:36 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 14:14:57 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 14:14:57 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 14:55:27 --> Severity: error --> Exception: Call to a member function result_array() on null C:\xampp7\htdocs\project-hao\tenis\tennis\application\models\Fixture_m.php 13
ERROR - 2019-01-23 15:12:05 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 15:12:05 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 15:12:33 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 15:12:33 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 15:12:33 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 15:12:33 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 15:12:47 --> Query error: Table 'tenis_new.product' doesn't exist - Invalid query: SELECT *
FROM `product`
WHERE `is_hight` = 1
AND `status` = 1
ORDER BY `product`.`id` DESC
 LIMIT 6
ERROR - 2019-01-23 15:12:47 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 195
ERROR - 2019-01-23 15:12:49 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 15:12:49 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 15:38:01 --> Query error: Unknown column 'registration' in 'field list' - Invalid query: SELECT `tournament_type`.`vn_name` AS `tournament_type`,  `tournament`.`vn_name` AS `tournament`, 
            `playing_category`.`vn_name` AS `noi_dung`, `set_score`.`set_number` AS `set`,  
            `set_score`.`first_registration_games`  AS `game_doi_1`, `set_score`.`second_registration_games`  AS `game_doi_2`, `registration` AS `code`,
            `fixture`.`first_registration_id` AS `user_1`, `fixture`.`second_registration_id` AS `user_2`
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`, `set_score`
            
            WHERE `tournament_type`.`id` = `tournament`.`pid` 
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id` 
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id` 
            AND `set_score`.`fixture_id` = `fixture`.`id`
ERROR - 2019-01-23 15:38:14 --> Query error: Unknown column 'registration' in 'field list' - Invalid query: SELECT `tournament_type`.`vn_name` AS `tournament_type`,  `tournament`.`vn_name` AS `tournament`, 
            `playing_category`.`vn_name` AS `noi_dung`, `set_score`.`set_number` AS `set`,  
            `set_score`.`first_registration_games`  AS `game_doi_1`, `set_score`.`second_registration_games`  AS `game_doi_2`, `registration` AS `code`,
            `fixture`.`first_registration_id` AS `user_1`, `fixture`.`second_registration_id` AS `user_2`
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`, `set_score`
            
            WHERE `tournament_type`.`id` = `tournament`.`pid` 
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id` 
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id` 
            AND `set_score`.`fixture_id` = `fixture`.`id`
ERROR - 2019-01-23 15:41:08 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_ca' at line 4 - Invalid query: SELECT `tournament_type`.`vn_name` AS `tournament_type`,  `tournament`.`vn_name` AS `tournament`, 
            `playing_category`.`vn_name` AS `noi_dung`, `set_score`.`set_number` AS `set`,  
            `set_score`.`first_registration_games`  AS `game_doi_1`, `set_score`.`second_registration_games`  AS `game_doi_2`, 
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`, `set_score` 
            WHERE `tournament_type`.`id` = `tournament`.`pid` 
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id` 
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id` 
            AND `set_score`.`fixture_id` = `fixture`.`id`
ERROR - 2019-01-23 15:41:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_ca' at line 4 - Invalid query: SELECT `tournament_type`.`vn_name` AS `tournament_type`,  `tournament`.`vn_name` AS `tournament`, 
            `playing_category`.`vn_name` AS `noi_dung`, `set_score`.`set_number` AS `set`,  
            `set_score`.`first_registration_games`  AS `game_doi_1`, `set_score`.`second_registration_games`  AS `game_doi_2`, 
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`, `set_score` 
            WHERE `tournament_type`.`id` = `tournament`.`pid` 
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id` 
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id` 
            AND `set_score`.`fixture_id` = `fixture`.`id`
ERROR - 2019-01-23 15:41:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_ca' at line 4 - Invalid query: SELECT `tournament_type`.`vn_name` AS `tournament_type`,  `tournament`.`vn_name` AS `tournament`, 
            `playing_category`.`vn_name` AS `noi_dung`, `set_score`.`set_number` AS `set`,  
            `set_score`.`first_registration_games`  AS `game_doi_1`, `set_score`.`second_registration_games`  AS `game_doi_2`, 
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`, `set_score` 
            WHERE `tournament_type`.`id` = `tournament`.`pid` 
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id` 
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id` 
            AND `set_score`.`fixture_id` = `fixture`.`id`
ERROR - 2019-01-23 16:18:36 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-23 16:18:36 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-23 16:20:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`fixture`.`first_registration_id` AS `code_doi_1`, `fixture`.`second_registratio' at line 5 - Invalid query: SELECT `tournament_type`.`vn_name` AS `tournament_type`, `tournament`.`vn_name` AS `tournament`, 
            `playing_category`.`vn_name` AS `noi_dung`, `set_score`.`set_number` AS `set`, 
            `set_score`.`first_registration_games` AS `game_doi_1`, `set_score`.`second_registration_games` AS `game_doi_2`,
            `fixture`.`id` AS `id`
            `fixture`.`first_registration_id` AS `code_doi_1`, `fixture`.`second_registration_id` AS `code_doi_2` 
            
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`, `set_score` 
            
            WHERE `tournament_type`.`id` = `tournament`.`pid` 
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id` 
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id` 
            AND `set_score`.`fixture_id` = `fixture`.`id`
ERROR - 2019-01-23 16:21:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`.`id` AS `id`,
            tournament_type`.`vn_name` AS `tournament_type`, `t' at line 1 - Invalid query: SELECT `
            `fixture`.`id` AS `id`,
            tournament_type`.`vn_name` AS `tournament_type`, `tournament`.`vn_name` AS `tournament`, 
            `playing_category`.`vn_name` AS `noi_dung`, `set_score`.`set_number` AS `set`, 
            `set_score`.`first_registration_games` AS `game_doi_1`, `set_score`.`second_registration_games` AS `game_doi_2`,
            `fixture`.`first_registration_id` AS `code_doi_1`, `fixture`.`second_registration_id` AS `code_doi_2` 
            
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`, `set_score` 
            
            WHERE `tournament_type`.`id` = `tournament`.`pid` 
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id` 
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id` 
            AND `set_score`.`fixture_id` = `fixture`.`id`
ERROR - 2019-01-23 16:22:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'DESC' at line 14 - Invalid query: SELECT 
            `fixture`.`id` AS `id`,
            `tournament_type`.`vn_name` AS `tournament_type`, `tournament`.`vn_name` AS `tournament`, 
            `playing_category`.`vn_name` AS `noi_dung`, `set_score`.`set_number` AS `set`, 
            `set_score`.`first_registration_games` AS `game_doi_1`, `set_score`.`second_registration_games` AS `game_doi_2`,
            `fixture`.`first_registration_id` AS `code_doi_1`, `fixture`.`second_registration_id` AS `code_doi_2` 
            
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`, `set_score` 
            
            WHERE `tournament_type`.`id` = `tournament`.`pid` 
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id` 
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id` 
            AND `set_score`.`fixture_id` = `fixture`.`id` ORDER BY DESC
ERROR - 2019-01-23 16:22:49 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ODER BY DESC' at line 14 - Invalid query: SELECT 
            `fixture`.`id` AS `id`,
            `tournament_type`.`vn_name` AS `tournament_type`, `tournament`.`vn_name` AS `tournament`, 
            `playing_category`.`vn_name` AS `noi_dung`, `set_score`.`set_number` AS `set`, 
            `set_score`.`first_registration_games` AS `game_doi_1`, `set_score`.`second_registration_games` AS `game_doi_2`,
            `fixture`.`first_registration_id` AS `code_doi_1`, `fixture`.`second_registration_id` AS `code_doi_2` 
            
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`, `set_score` 
            
            WHERE `tournament_type`.`id` = `tournament`.`pid` 
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id` 
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id` 
            AND `set_score`.`fixture_id` = `fixture`.`id` ODER BY DESC
ERROR - 2019-01-23 16:23:08 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ODER BY fixture`.`id` DESC' at line 14 - Invalid query: SELECT 
            `fixture`.`id` AS `id`,
            `tournament_type`.`vn_name` AS `tournament_type`, `tournament`.`vn_name` AS `tournament`, 
            `playing_category`.`vn_name` AS `noi_dung`, `set_score`.`set_number` AS `set`, 
            `set_score`.`first_registration_games` AS `game_doi_1`, `set_score`.`second_registration_games` AS `game_doi_2`,
            `fixture`.`first_registration_id` AS `code_doi_1`, `fixture`.`second_registration_id` AS `code_doi_2` 
            
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`, `set_score` 
            
            WHERE `tournament_type`.`id` = `tournament`.`pid` 
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id` 
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id` 
            AND `set_score`.`fixture_id` = `fixture`.`id` ODER BY fixture`.`id` DESC
ERROR - 2019-01-23 16:23:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ODER BY fixture`.`id` DESC' at line 14 - Invalid query: SELECT 
            `fixture`.`id` AS `id`,
            `tournament_type`.`vn_name` AS `tournament_type`, `tournament`.`vn_name` AS `tournament`, 
            `playing_category`.`vn_name` AS `noi_dung`, `set_score`.`set_number` AS `set`, 
            `set_score`.`first_registration_games` AS `game_doi_1`, `set_score`.`second_registration_games` AS `game_doi_2`,
            `fixture`.`first_registration_id` AS `code_doi_1`, `fixture`.`second_registration_id` AS `code_doi_2` 
            
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`, `set_score` 
            
            WHERE `tournament_type`.`id` = `tournament`.`pid` 
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id` 
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id` 
            AND `set_score`.`fixture_id` = `fixture`.`id` ODER BY fixture`.`id` DESC
ERROR - 2019-01-23 16:23:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ODER BY `fixture`.`id` DESC' at line 14 - Invalid query: SELECT 
            `fixture`.`id` AS `id`,
            `tournament_type`.`vn_name` AS `tournament_type`, `tournament`.`vn_name` AS `tournament`, 
            `playing_category`.`vn_name` AS `noi_dung`, `set_score`.`set_number` AS `set`, 
            `set_score`.`first_registration_games` AS `game_doi_1`, `set_score`.`second_registration_games` AS `game_doi_2`,
            `fixture`.`first_registration_id` AS `code_doi_1`, `fixture`.`second_registration_id` AS `code_doi_2` 
            
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`, `set_score` 
            
            WHERE `tournament_type`.`id` = `tournament`.`pid` 
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id` 
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id` 
            AND `set_score`.`fixture_id` = `fixture`.`id` ODER BY `fixture`.`id` DESC
ERROR - 2019-01-23 16:23:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ODER BY `fixture`.`id` DESC' at line 14 - Invalid query: SELECT 
            `fixture`.`id` AS `id`,
            `tournament_type`.`vn_name` AS `tournament_type`, `tournament`.`vn_name` AS `tournament`, 
            `playing_category`.`vn_name` AS `noi_dung`, `set_score`.`set_number` AS `set`, 
            `set_score`.`first_registration_games` AS `game_doi_1`, `set_score`.`second_registration_games` AS `game_doi_2`,
            `fixture`.`first_registration_id` AS `code_doi_1`, `fixture`.`second_registration_id` AS `code_doi_2` 
            
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`, `set_score` 
            
            WHERE `tournament_type`.`id` = `tournament`.`pid` 
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id` 
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id` 
            AND `set_score`.`fixture_id` = `fixture`.`id` ODER BY `fixture`.`id` DESC
ERROR - 2019-01-23 16:23:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ODER BY `id` DESC' at line 14 - Invalid query: SELECT 
            `fixture`.`id` AS `id`,
            `tournament_type`.`vn_name` AS `tournament_type`, `tournament`.`vn_name` AS `tournament`, 
            `playing_category`.`vn_name` AS `noi_dung`, `set_score`.`set_number` AS `set`, 
            `set_score`.`first_registration_games` AS `game_doi_1`, `set_score`.`second_registration_games` AS `game_doi_2`,
            `fixture`.`first_registration_id` AS `code_doi_1`, `fixture`.`second_registration_id` AS `code_doi_2` 
            
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`, `set_score` 
            
            WHERE `tournament_type`.`id` = `tournament`.`pid` 
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id` 
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id` 
            AND `set_score`.`fixture_id` = `fixture`.`id` ODER BY `id` DESC
ERROR - 2019-01-23 17:02:04 --> Query error: Unknown column 'cid' in 'where clause' - Invalid query: SELECT *
FROM `tournament`
WHERE `cid` = 2
ORDER BY `tournament`.`id` DESC
ERROR - 2019-01-23 17:02:04 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 153
