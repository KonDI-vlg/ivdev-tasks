<?php
require_once "Database.php";


$query = Database::prepare("delete products from products
LEFT JOIN availabilities on products.id = availabilities.product_id
where availabilities.product_id IS NULL");
$query->execute();

$query = Database::prepare("delete categories from categories
LEFT JOIN products on products.category_id = categories.id
where products.category_id IS NULL");
$query->execute();

$query = Database::prepare("delete stocks from stocks
left join availabilities on stocks.id = availabilities.stock_id
where availabilities.stock_id is NULL");
$query->execute();
