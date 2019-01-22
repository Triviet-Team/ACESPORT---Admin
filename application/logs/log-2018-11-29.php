<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-11-29 14:20:48 --> Query error: Unknown column 'is_new' in 'where clause' - Invalid query: SELECT *
FROM `product_category`
WHERE `pid` = '6'
AND `status` = 1
AND `is_new` = 1
ORDER BY `id` ASC
 LIMIT 6
ERROR - 2018-11-29 14:23:34 --> Query error: Unknown column 'is_new' in 'where clause' - Invalid query: SELECT *
FROM `product_category`
WHERE `is_new` = 1
AND `id` IN(2, 3, 4, 5, 6, 7)
ORDER BY `product_category`.`id` DESC
ERROR - 2018-11-29 14:25:19 --> Query error: Unknown column 'is_new' in 'where clause' - Invalid query: SELECT *
FROM `product_category`
WHERE `id` IN(2, 3, 4, 5, 6, 7)
AND `is_new` = 1
ORDER BY `product_category`.`id` DESC
ERROR - 2018-11-29 14:25:21 --> Query error: Unknown column 'is_new' in 'where clause' - Invalid query: SELECT *
FROM `product_category`
WHERE `id` IN(2, 3, 4, 5, 6, 7)
AND `is_new` = 1
ORDER BY `product_category`.`id` DESC
