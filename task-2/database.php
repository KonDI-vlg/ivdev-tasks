<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=task-2','root', 'root');
}
catch (PDOException $e){
    echo $e->getMessage();
    die;
}

try {
    $sql = "delete products from products
LEFT JOIN availabilities on products.id = availabilities.product_id
where availabilities.product_id IS NULL";
    $db->query($sql);

    $sql = "delete categories from categories
LEFT JOIN products on products.category_id = categories.id
where products.category_id IS NULL";
    $db->query($sql);

    $sql = "delete stocks from stocks
left join availabilities on stocks.id = availabilities.stock_id
where availabilities.stock_id is NULL;";
    $db->query($sql);

    echo "Successfully deleted";
}
catch (Exception $e){
    echo "Error: " . $e->getMessage();
}
