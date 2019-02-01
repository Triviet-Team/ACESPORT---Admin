<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-01-27 09:06:27 --> Query error: Table 'tenis_db.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-27 09:06:44 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `tournament`
WHERE `pid` IS NULL
ORDER BY `tournament`.`id` DESC
ERROR - 2019-01-27 09:06:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-27 09:13:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-27 09:13:44 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `tournament`
WHERE `pid` IS NULL
ORDER BY `tournament`.`id` DESC
ERROR - 2019-01-27 09:13:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-27 09:13:46 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `tournament`
WHERE `pid` IS NULL
ORDER BY `tournament`.`id` DESC
ERROR - 2019-01-27 09:14:04 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `tournament`
WHERE `pid` = '1'
ORDER BY `tournament`.`id` DESC
ERROR - 2019-01-27 09:14:09 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `tournament`
WHERE `pid` = '2'
ORDER BY `tournament`.`id` DESC
ERROR - 2019-01-27 09:14:11 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `tournament`
WHERE `pid` = '1'
ORDER BY `tournament`.`id` DESC
ERROR - 2019-01-27 10:01:33 --> Query error: Unknown column 'tournament.pid' in 'where clause' - Invalid query: SELECT 
            `fixture`.`id` AS `id`,
            `tournament_type`.`vn_name` AS `tournament_type`, `tournament`.`vn_name` AS `tournament`, 
            `playing_category`.`vn_name` AS `noi_dung`,
            `fixture`.`first_registration_id` AS `code_doi_1`, `fixture`.`second_registration_id` AS `code_doi_2` 
            
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`
            
            WHERE `tournament_type`.`id` = `tournament`.`pid` 
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id` 
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id` 
           
            
            ORDER BY `id` DESC
ERROR - 2019-01-27 10:13:57 --> Query error: Unknown column 'tournament.pid' in 'where clause' - Invalid query: SELECT 
            `fixture`.`id` AS `id`,
            `tournament_type`.`vn_name` AS `tournament_type`, `tournament`.`vn_name` AS `tournament`, 
            `playing_category`.`vn_name` AS `noi_dung`,
            `fixture`.`first_registration_id` AS `code_doi_1`, `fixture`.`second_registration_id` AS `code_doi_2` 
            
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`
            
            WHERE `tournament_type`.`id` = `tournament`.`pid` 
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id` 
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id` 
           
            
            ORDER BY `id` DESC
ERROR - 2019-01-27 10:18:27 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `tournament`
WHERE `pid` = '1'
ORDER BY `tournament`.`id` DESC
ERROR - 2019-01-27 10:20:38 --> Query error: Unknown column 'tournament.pid' in 'where clause' - Invalid query: SELECT 
            `fixture`.`id` AS `id`,
            `tournament_type`.`vn_name` AS `tournament_type`, `tournament`.`vn_name` AS `tournament`, 
            `playing_category`.`vn_name` AS `noi_dung`,
            `fixture`.`first_registration_id` AS `code_doi_1`, `fixture`.`second_registration_id` AS `code_doi_2` 
            
            FROM `tournament_type`, `tournament`, `tournament_playing_category`, `playing_category`, `fixture`
            
            WHERE `tournament_type`.`id` = `tournament`.`pid` 
            AND `tournament`.`id` = `tournament_playing_category`.`tournament_id` 
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament_playing_category`.`id` = `fixture`.`tournament_playing_category_id` 
           
            
            ORDER BY `id` DESC
ERROR - 2019-01-27 10:51:36 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-27 10:51:36 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `tournament`
WHERE `pid` IS NULL
ORDER BY `tournament`.`id` DESC
