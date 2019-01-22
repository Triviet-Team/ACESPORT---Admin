<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-01-22 13:32:53 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-22 13:32:53 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 139
ERROR - 2019-01-22 13:33:13 --> Query error: Table 'tenis_new.users' doesn't exist - Invalid query: SELECT *
FROM `users`
WHERE `tid` >= 2
AND `username` = 'triviet'
AND `password` = '215bd54fbb7be28fa7b4b8ff48ecf53c'
AND `status` = 1
ERROR - 2019-01-22 13:33:13 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 139
ERROR - 2019-01-22 13:47:22 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-22 13:47:22 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 139
ERROR - 2019-01-22 13:47:58 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-22 13:47:58 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 139
ERROR - 2019-01-22 13:47:59 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-22 13:47:59 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 139
ERROR - 2019-01-22 13:48:00 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-22 13:48:00 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 139
ERROR - 2019-01-22 13:48:00 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-22 13:48:00 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 139
ERROR - 2019-01-22 13:48:37 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-22 13:48:37 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 139
ERROR - 2019-01-22 15:01:48 --> Severity: error --> Exception: Call to a member function get_total() on null C:\xampp7\htdocs\project-hao\tenis\application\controllers\admincp\tournament\Tournament_category.php 41
ERROR - 2019-01-22 15:02:14 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-22 15:02:14 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 139
ERROR - 2019-01-22 15:02:56 --> Query error: Table 'tenis_new.product_category' doesn't exist - Invalid query: SELECT *
FROM `product_category`
WHERE `pid` = 1
ORDER BY `product_category`.`id` DESC
ERROR - 2019-01-22 15:02:56 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 195
ERROR - 2019-01-22 15:04:19 --> Query error: Table 'tenis_new.product' doesn't exist - Invalid query: SELECT *
FROM `product`
WHERE `cid` = 1
ERROR - 2019-01-22 15:04:19 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 251
ERROR - 2019-01-22 15:16:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')' at line 2 - Invalid query: UPDATE `tournament` SET `status` = 2
WHERE `cid` in ()
ERROR - 2019-01-22 15:26:41 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC), expecting end of file C:\xampp7\htdocs\project-hao\tenis\application\controllers\admincp\Admin.php 155
ERROR - 2019-01-22 15:26:47 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC), expecting end of file C:\xampp7\htdocs\project-hao\tenis\application\controllers\admincp\Admin.php 155
ERROR - 2019-01-22 15:52:09 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `tournament_playing_category`
WHERE `pid` = 0
ORDER BY `tournament_playing_category`.`id` DESC
ERROR - 2019-01-22 15:52:09 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 15:54:42 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 15:54:42 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 15:57:00 --> Query error: Table 'tenis_new.product' doesn't exist - Invalid query: SELECT *
FROM `product`
WHERE `is_hight` = 1
AND `status` = 1
ORDER BY `product`.`id` DESC
 LIMIT 6
ERROR - 2019-01-22 15:57:00 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 195
ERROR - 2019-01-22 15:57:01 --> Query error: Table 'tenis_new.product' doesn't exist - Invalid query: SELECT *
FROM `product`
WHERE `is_hight` = 1
AND `status` = 1
ORDER BY `product`.`id` DESC
 LIMIT 6
ERROR - 2019-01-22 15:57:01 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 195
ERROR - 2019-01-22 15:57:02 --> Query error: Table 'tenis_new.product' doesn't exist - Invalid query: SELECT *
FROM `product`
WHERE `is_hight` = 1
AND `status` = 1
ORDER BY `product`.`id` DESC
 LIMIT 6
ERROR - 2019-01-22 15:57:02 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 195
ERROR - 2019-01-22 15:59:13 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 15:59:13 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 15:59:26 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 15:59:26 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:00:09 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
 LIMIT 20
ERROR - 2019-01-22 16:00:09 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 195
ERROR - 2019-01-22 16:00:10 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
 LIMIT 20
ERROR - 2019-01-22 16:00:10 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 195
ERROR - 2019-01-22 16:00:10 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
 LIMIT 20
ERROR - 2019-01-22 16:00:10 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 195
ERROR - 2019-01-22 16:00:10 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
 LIMIT 20
ERROR - 2019-01-22 16:00:10 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 195
ERROR - 2019-01-22 16:00:10 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
 LIMIT 20
ERROR - 2019-01-22 16:00:10 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 195
ERROR - 2019-01-22 16:02:30 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:02:30 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:04:02 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:04:02 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:05:40 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:05:40 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:05:40 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:05:40 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:05:40 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:05:40 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:05:41 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:05:41 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:05:41 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:05:41 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:05:41 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:05:41 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:06:52 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:06:52 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:09:32 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:09:32 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:09:32 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:09:32 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:09:33 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:09:33 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:09:33 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:09:33 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:09:33 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:09:33 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:09:33 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:09:33 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:09:53 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:09:53 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:12:36 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:12:36 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:12:37 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:12:37 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:12:38 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:12:38 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:12:38 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:12:38 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:12:38 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:12:38 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:12:38 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:12:38 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:12:39 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:12:39 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:13:34 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:13:34 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:13:35 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:13:35 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:13:35 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:13:35 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:13:36 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:13:36 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:13:36 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:13:36 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:13:36 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:13:36 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 154
ERROR - 2019-01-22 16:15:25 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:15:25 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 196
ERROR - 2019-01-22 16:15:27 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:15:27 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 196
ERROR - 2019-01-22 16:15:28 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:15:28 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 196
ERROR - 2019-01-22 16:15:28 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 0
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:15:28 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 196
ERROR - 2019-01-22 16:15:48 --> Query error: Table 'tenis_new.configs' doesn't exist - Invalid query: SELECT *
FROM `configs`
WHERE `key` = 'general'
ERROR - 2019-01-22 16:15:48 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 139
ERROR - 2019-01-22 16:16:05 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 2
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:16:05 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 196
ERROR - 2019-01-22 16:16:10 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 2
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:16:10 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 196
ERROR - 2019-01-22 16:18:36 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 2
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:18:36 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 196
ERROR - 2019-01-22 16:18:37 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 2
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:18:37 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 196
ERROR - 2019-01-22 16:18:49 --> Query error: Unknown column 'pid' in 'where clause' - Invalid query: SELECT *
FROM `playing_category`
WHERE `pid` = 2
ORDER BY `playing_category`.`id` DESC
ERROR - 2019-01-22 16:18:49 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp7\htdocs\project-hao\tenis\application\core\MY_Model.php 196
ERROR - 2019-01-22 16:33:55 --> Severity: error --> Exception: Call to a member function get_list() on null C:\xampp7\htdocs\project-hao\tenis\application\controllers\admincp\tournament\Playing_category.php 56
ERROR - 2019-01-22 16:36:10 --> Severity: error --> Exception: Call to a member function get_list() on null C:\xampp7\htdocs\project-hao\tenis\application\controllers\admincp\tournament\Playing_category.php 56
ERROR - 2019-01-22 16:36:12 --> Severity: error --> Exception: Call to a member function get_list() on null C:\xampp7\htdocs\project-hao\tenis\application\controllers\admincp\tournament\Playing_category.php 56
ERROR - 2019-01-22 16:36:26 --> Severity: error --> Exception: Call to a member function get_list() on null C:\xampp7\htdocs\project-hao\tenis\application\controllers\admincp\tournament\Playing_category.php 56
ERROR - 2019-01-22 16:38:13 --> Severity: error --> Exception: Call to a member function get_list() on null C:\xampp7\htdocs\project-hao\tenis\application\controllers\admincp\tournament\Playing_category.php 68
ERROR - 2019-01-22 16:41:54 --> Severity: error --> Exception: Call to a member function get_list() on null C:\xampp7\htdocs\project-hao\tenis\application\controllers\admincp\tournament\Playing_category.php 68
ERROR - 2019-01-22 16:42:44 --> Query error: Unknown column 'image_link' in 'field list' - Invalid query: INSERT INTO `playing_category` (`vn_name`, `vn_slug`, `vn_keyword`, `vn_title`, `vn_description`, `vn_sapo`, `vn_detail`, `image_link`, `image_list`, `status`, `created`) VALUES ('Nội thất Ý Segis', 'noi-that-y-segis', 'Nội thất Ý Segis', 'Nội thất Ý Segis', 'Nội thất Ý Segis', NULL, NULL, NULL, NULL, '1', 1548150164)
