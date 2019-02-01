<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-01-29 21:29:18 --> Query error: Table 'tenis_db.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-29 21:29:35 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `tournament`
WHERE `pid` IS NULL
ORDER BY `tournament`.`id` DESC
ERROR - 2019-01-29 21:29:35 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-29 21:30:01 --> Query error: Unknown column 'tournament.pid' in 'where clause' - Invalid query: SELECT 
            `fixture`.`id` AS `id`,
            `tournament_type`.`vn_name` AS `tournament_type`, `tournament`.`vn_name` AS `tournament`, 
            `playing_category`.`vn_name` AS `noi_dung`,
            `fixture`.`first_registration_id` AS `code_doi_1`, `fixture`.`second_registration_id` AS `code_doi_2` 
            , `set_score`.`first_registration_games` AS `game_1` 
            , `set_score`.`second_registration_games` AS `game_2` 
            
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`, `set_score`
            
            WHERE `tournament_type`.`id` = `tournament`.`pid` 
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id` 
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id` 
            AND `fixture`.`id` =  `set_score`.`fixture_id`
           
            
            ORDER BY `id` DESC
ERROR - 2019-01-29 21:31:04 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `tournament`
WHERE `pid` = '1'
ORDER BY `tournament`.`id` DESC
ERROR - 2019-01-29 21:31:09 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `tournament`
WHERE `pid` IS NULL
ORDER BY `tournament`.`id` DESC
ERROR - 2019-01-29 21:31:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-29 21:31:14 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `tournament`
WHERE `pid` IS NULL
ORDER BY `tournament`.`id` DESC
ERROR - 2019-01-29 21:31:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-29 21:31:24 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `tournament`
WHERE `pid` IS NULL
ORDER BY `tournament`.`id` DESC
ERROR - 2019-01-29 21:31:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-29 21:32:33 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `tournament`
WHERE `pid` IS NULL
ORDER BY `tournament`.`id` DESC
ERROR - 2019-01-29 21:32:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-29 21:37:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-29 21:37:28 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `tournament`
WHERE `pid` IS NULL
ORDER BY `tournament`.`id` DESC
ERROR - 2019-01-29 21:37:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-29 21:37:30 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `tournament`
WHERE `pid` IS NULL
ORDER BY `tournament`.`id` DESC
ERROR - 2019-01-29 21:48:36 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-29 21:48:59 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-29 21:49:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-29 21:49:49 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-29 21:50:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-29 22:08:46 --> Query error: Table 'tenis_db.fixture_result' doesn't exist - Invalid query: INSERT INTO `fixture_result` (`fixture_id`, `winner_registration_id`, `number_of_sets_played`) VALUES (10, 0, 1)
ERROR - 2019-01-29 22:09:15 --> Query error: Table 'tenis_db.fixture_result' doesn't exist - Invalid query: INSERT INTO `fixture_result` (`fixture_id`, `winner_registration_id`, `number_of_sets_played`) VALUES (11, 0, 1)
ERROR - 2019-01-29 22:09:38 --> Query error: Table 'tenis_db.fixture_result' doesn't exist - Invalid query: INSERT INTO `fixture_result` (`fixture_id`, `winner_registration_id`, `number_of_sets_played`) VALUES (12, 0, 1)
ERROR - 2019-01-29 22:10:05 --> Query error: Table 'tenis_db.fixture_result' doesn't exist - Invalid query: INSERT INTO `fixture_result` (`fixture_id`, `winner_registration_id`, `number_of_sets_played`) VALUES (13, 0, 1)
ERROR - 2019-01-29 22:10:42 --> Query error: Table 'tenis_db.fixture_result' doesn't exist - Invalid query: INSERT INTO `fixture_result` (`fixture_id`, `winner_registration_id`, `number_of_sets_played`) VALUES (14, 0, 1)
ERROR - 2019-01-29 22:11:00 --> Query error: Table 'tenis_db.fixture_result' doesn't exist - Invalid query: INSERT INTO `fixture_result` (`fixture_id`, `winner_registration_id`, `number_of_sets_played`) VALUES (15, 0, 1)
ERROR - 2019-01-29 22:11:22 --> Query error: Table 'tenis_db.fixture_result' doesn't exist - Invalid query: INSERT INTO `fixture_result` (`fixture_id`, `winner_registration_id`, `number_of_sets_played`) VALUES (16, 0, 1)
ERROR - 2019-01-29 22:11:42 --> Query error: Table 'tenis_db.fixture_result' doesn't exist - Invalid query: INSERT INTO `fixture_result` (`fixture_id`, `winner_registration_id`, `number_of_sets_played`) VALUES (17, 0, 1)
ERROR - 2019-01-29 22:11:56 --> Query error: Table 'tenis_db.fixture_result' doesn't exist - Invalid query: INSERT INTO `fixture_result` (`fixture_id`, `winner_registration_id`, `number_of_sets_played`) VALUES (18, 0, 1)
ERROR - 2019-01-29 22:12:13 --> Query error: Table 'tenis_db.fixture_result' doesn't exist - Invalid query: INSERT INTO `fixture_result` (`fixture_id`, `winner_registration_id`, `number_of_sets_played`) VALUES (19, 0, 1)
ERROR - 2019-01-29 22:12:37 --> Query error: Table 'tenis_db.fixture_result' doesn't exist - Invalid query: INSERT INTO `fixture_result` (`fixture_id`, `winner_registration_id`, `number_of_sets_played`) VALUES (20, 0, 1)
ERROR - 2019-01-29 22:13:09 --> Query error: Table 'tenis_db.fixture_result' doesn't exist - Invalid query: INSERT INTO `fixture_result` (`fixture_id`, `winner_registration_id`, `number_of_sets_played`) VALUES (21, 0, 1)
ERROR - 2019-01-29 22:13:23 --> Query error: Table 'tenis_db.fixture_result' doesn't exist - Invalid query: INSERT INTO `fixture_result` (`fixture_id`, `winner_registration_id`, `number_of_sets_played`) VALUES (22, 0, 1)
ERROR - 2019-01-29 22:13:53 --> Query error: Table 'tenis_db.fixture_result' doesn't exist - Invalid query: INSERT INTO `fixture_result` (`fixture_id`, `winner_registration_id`, `number_of_sets_played`) VALUES (23, 0, 1)
ERROR - 2019-01-29 22:14:07 --> Query error: Table 'tenis_db.fixture_result' doesn't exist - Invalid query: INSERT INTO `fixture_result` (`fixture_id`, `winner_registration_id`, `number_of_sets_played`) VALUES (24, 0, 1)
ERROR - 2019-01-29 22:14:25 --> Query error: Table 'tenis_db.fixture_result' doesn't exist - Invalid query: INSERT INTO `fixture_result` (`fixture_id`, `winner_registration_id`, `number_of_sets_played`) VALUES (25, 0, 1)
ERROR - 2019-01-29 22:15:15 --> Query error: Table 'tenis_db.fixture_result' doesn't exist - Invalid query: SELECT
            `fixture`.`id` AS `id`,
            `tournament_type`.`vn_name` AS `tournament_type`, `tournament_type`.`id` AS `tournament_type_id`, `tournament`.`vn_name` AS `tournament`, `tournament`.`id` AS `tournament_id`,
            `playing_category`.`vn_name` AS `noi_dung`,
            `fixture`.`first_registration_id` AS `code_doi_1`, `fixture`.`second_registration_id` AS `code_doi_2`,
            
            `fixture`.`round` AS `round`, `tournament_playing_category`.`set`, `tournament_playing_category`.`id` AS `noi_dung_id`,
            `fixture_result`.`id` AS `fixture_result_id`,
            `set_score`.`id` AS `set_score_id`
    
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`, `fixture_result`, `set_score`
    
            WHERE `tournament_type`.`id` = `tournament`.`pid`
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id`
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id`
            AND `set_score`.`fixture_id` = `fixture`.`id`
            AND `fixture`.`id` = `fixture_result`.`fixture_id`
      
             AND `fixture`.`id` = 25
            ORDER BY `id` DESC
ERROR - 2019-01-29 22:15:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-29 22:16:26 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-29 22:17:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
