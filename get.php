<?php
require 'config.php';

$id = $_REQUEST['id_cat'];

//$data = Goods::all();
//http_response_code(200);
//echo json_encode($data);

$data = Category::find($id);
if (!empty($data)) {
    http_response_code(200);
    echo json_encode($data);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'not found']);
}

$id = $_REQUEST['id'];
$data = Goods::find($id);
if (!empty($data)) {
    http_response_code(200);
    echo json_encode($data);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'not found']);
}