<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-07-24 11:30:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')' at line 2 - Invalid query: UPDATE `articles` SET `status` = 3
WHERE `cid` in ()
ERROR - 2018-07-24 15:57:53 --> Query error: Unknown column 'where' in 'where clause' - Invalid query: SELECT *
FROM `ads`
WHERE `where` = Array
ERROR - 2018-07-24 15:57:53 --> Severity: error --> Exception: Call to a member function num_rows() on boolean C:\xampp7\htdocs\job\dogonguyenhoang\application\core\MY_Model.php 139
