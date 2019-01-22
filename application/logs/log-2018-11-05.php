<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-11-05 09:01:13 --> Query error: Unknown column 't' in 'where clause' - Invalid query: SELECT *
FROM `users`
WHERE `t` LIKE '%!%t!%%' ESCAPE '!'
ORDER BY `users`.`id` DESC
ERROR - 2018-11-05 09:01:13 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp7\htdocs\job\dhs\application\core\MY_Model.php 195
ERROR - 2018-11-05 09:04:18 --> Query error: Unknown column 't' in 'where clause' - Invalid query: SELECT *
FROM `users`
WHERE `t` LIKE '%!%t!%%' ESCAPE '!'
ORDER BY `users`.`id` DESC
ERROR - 2018-11-05 09:04:18 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp7\htdocs\job\dhs\application\core\MY_Model.php 195
ERROR - 2018-11-05 09:11:37 --> Query error: Unknown column 't' in 'where clause' - Invalid query: SELECT *
FROM `users`
WHERE `t` LIKE '%t%' ESCAPE '!'
ORDER BY `users`.`id` DESC
ERROR - 2018-11-05 09:11:37 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp7\htdocs\job\dhs\application\core\MY_Model.php 195
ERROR - 2018-11-05 09:11:47 --> Query error: Unknown column 'triviet' in 'where clause' - Invalid query: SELECT *
FROM `users`
WHERE `triviet` LIKE '%triviet%' ESCAPE '!'
ORDER BY `users`.`id` DESC
ERROR - 2018-11-05 09:11:47 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp7\htdocs\job\dhs\application\core\MY_Model.php 195
ERROR - 2018-11-05 11:09:30 --> Severity: error --> Exception: syntax error, unexpected ')' C:\xampp7\htdocs\job\dhs\application\controllers\admincp\Admin.php 115
ERROR - 2018-11-05 13:34:18 --> Severity: error --> Exception: Call to a member function get_list() on null C:\xampp7\htdocs\job\dhs\application\controllers\admincp\Articles_category.php 28
ERROR - 2018-11-05 13:52:40 --> Severity: error --> Exception: syntax error, unexpected '<' C:\xampp7\htdocs\job\dhs\application\views\admin\articles_category\index.php 66
ERROR - 2018-11-05 14:11:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')' at line 2 - Invalid query: UPDATE `articles` SET `status` = 2
WHERE `cid` in ()
ERROR - 2018-11-05 14:11:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')' at line 2 - Invalid query: UPDATE `articles` SET `status` = 3
WHERE `cid` in ()
ERROR - 2018-11-05 14:11:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')' at line 2 - Invalid query: UPDATE `articles` SET `status` = 2
WHERE `cid` in ()
ERROR - 2018-11-05 14:44:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
ORDER BY `articles_category`.`id` DESC' at line 3 - Invalid query: SELECT *
FROM `articles_category`
WHERE `pid` in ()
ORDER BY `articles_category`.`id` DESC
ERROR - 2018-11-05 14:44:18 --> Severity: error --> Exception: Call to a member function result() on boolean C:\xampp7\htdocs\job\dhs\application\core\MY_Model.php 195
ERROR - 2018-11-05 15:02:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')' at line 2 - Invalid query: UPDATE `articles` SET `status` = 2
WHERE `cid` in ()
ERROR - 2018-11-05 15:02:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')' at line 2 - Invalid query: UPDATE `articles` SET `status` = 2
WHERE `cid` in ()
ERROR - 2018-11-05 15:02:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')' at line 2 - Invalid query: UPDATE `articles` SET `status` = 3
WHERE `cid` in ()
