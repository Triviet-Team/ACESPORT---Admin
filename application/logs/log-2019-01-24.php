<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-01-24 08:22:28 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-24 08:22:28 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-24 08:24:03 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-24 08:24:03 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-24 08:24:27 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-24 08:24:27 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-24 08:25:38 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-24 08:25:38 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 138
ERROR - 2019-01-24 09:09:40 --> Severity: error --> Exception: Call to undefined method Fixture::getIdsForTable() C:\xampp7\htdocs\project-hao\tenis\tennis\application\controllers\admincp\tournament\Fixture.php 32
ERROR - 2019-01-24 09:09:51 --> Severity: error --> Exception: Call to undefined method Fixture::getIdsForTable() C:\xampp7\htdocs\project-hao\tenis\tennis\application\controllers\admincp\tournament\Fixture.php 32
ERROR - 2019-01-24 09:10:40 --> Severity: error --> Exception: Call to undefined method Fixture::getIdsForTable() C:\xampp7\htdocs\project-hao\tenis\tennis\application\controllers\admincp\tournament\Fixture.php 32
ERROR - 2019-01-24 09:11:16 --> Severity: error --> Exception: syntax error, unexpected '$this' (T_VARIABLE) C:\xampp7\htdocs\project-hao\tenis\tennis\application\controllers\admincp\tournament\Fixture.php 32
ERROR - 2019-01-24 09:11:21 --> Severity: error --> Exception: syntax error, unexpected '$this' (T_VARIABLE) C:\xampp7\htdocs\project-hao\tenis\tennis\application\controllers\admincp\tournament\Fixture.php 32
ERROR - 2019-01-24 09:12:32 --> Severity: error --> Exception: Call to undefined method Fixture::getIdsForTable() C:\xampp7\htdocs\project-hao\tenis\tennis\application\controllers\admincp\tournament\Fixture.php 19
ERROR - 2019-01-24 09:17:36 --> Severity: error --> Exception: Call to a member function get_list() on null C:\xampp7\htdocs\project-hao\tenis\tennis\application\models\Fixture_m.php 63
ERROR - 2019-01-24 10:58:20 --> Query error: Unknown column 'vn_name' in 'where clause' - Invalid query: SELECT *
FROM `fixture`
WHERE `vn_name` IS NULL
ORDER BY `fixture`.`id` DESC
ERROR - 2019-01-24 10:58:20 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\tennis\application\core\MY_Model.php 153
ERROR - 2019-01-24 11:28:11 --> Severity: error --> Exception: syntax error, unexpected 'round' (T_STRING), expecting ',' or ';' C:\xampp7\htdocs\project-hao\tenis\tennis\application\views\admin\tournament\fixture\index.php 83
ERROR - 2019-01-24 13:39:05 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 13:39:11 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 13:39:15 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 13:52:46 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 13:53:09 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 13:54:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-24 13:54:07 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC), expecting end of file C:\xampp7\htdocs\project-hao\tenis\tennis\application\controllers\admincp\Admin.php 155
ERROR - 2019-01-24 13:54:10 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-24 13:54:49 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 13:54:54 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 14:16:18 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 14:16:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-24 14:17:03 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 14:17:06 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 14:17:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-24 14:18:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-24 14:21:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-24 14:23:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-24 14:45:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-24 14:46:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-24 14:47:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-24 14:47:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-24 14:49:27 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 14:49:31 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 14:49:32 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 14:49:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-24 14:49:37 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 14:51:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-24 14:52:35 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 14:53:12 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 14:54:53 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 14:59:42 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:02:09 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:04:47 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC), expecting end of file C:\xampp7\htdocs\project-hao\tenis\tennis\application\controllers\admincp\Admin.php 155
ERROR - 2019-01-24 15:04:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-24 15:13:23 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:14:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-24 15:14:36 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:15:12 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:15:54 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:17:36 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:19:03 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:19:45 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:20:13 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:21:31 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:22:03 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:22:47 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:23:40 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:24:12 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:25:43 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:26:12 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:26:18 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:27:49 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:29:39 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:30:11 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:30:43 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:31:40 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:32:08 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:32:15 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:33:25 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:33:57 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:34:31 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:37:40 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:38:38 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:39:11 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:39:13 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:39:37 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:41:55 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:43:06 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:43:41 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:45:28 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:45:35 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:45:38 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:45:39 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:45:39 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:45:40 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:46:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-24 15:46:54 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-24 15:46:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-24 15:47:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-24 15:48:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-24 15:48:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-24 15:48:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = 
ERROR - 2019-01-24 15:49:52 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 15:50:03 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 16:08:04 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 16:09:12 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 16:09:36 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 16:14:39 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 16:16:51 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 16:18:47 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 16:20:03 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 16:20:28 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 16:20:42 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 16:24:03 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 16:26:53 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 16:27:05 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 16:29:49 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 16:30:00 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 16:30:13 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 16:30:13 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 16:31:28 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 16:32:17 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 16:33:55 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 16:35:03 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 16:35:05 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 16:36:23 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 16:37:56 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 16:38:03 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 16:56:31 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 17:06:12 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 17:06:46 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 17:10:50 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 17:11:46 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 17:19:13 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 17:20:18 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 17:20:32 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 17:20:51 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 17:21:11 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 17:22:06 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
ERROR - 2019-01-24 17:23:52 --> Query error: Unknown column 'tournament' in 'where clause' - Invalid query: SELECT
            `tournament_playing_category`.`id` AS `id`,
            `playing_category`.`vn_name` AS `vn_name`
        
            FROM `tournament`, `tournament_playing_category`, `playing_category`
        
            WHERE `tournament`.`id` = `tournament_playing_category`.`tournament_id`
            AND `playing_category`.`id` = `tournament_playing_category`.`playing_category_id` 
            AND `tournament`.`id` = tournament
