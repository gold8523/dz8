<?php
require 'config.php';

$data = Goods::all();
http_response_code(200);
echo json_encode($data);