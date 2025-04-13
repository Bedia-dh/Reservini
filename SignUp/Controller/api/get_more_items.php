<?php
require_once(__DIR__ . '/../../model/CategoriesData.php');

$category = $_GET['category'] ?? 'restaurants';
$offset = (int)$_GET['offset'] ?? 0;
$limit = (int)$_GET['limit'] ?? 3;

$categories = CategoriesData::getAllCategories();
$items = array_slice($categories[$category], $offset, $limit);

header('Content-Type: application/json');
echo json_encode($items);
?>