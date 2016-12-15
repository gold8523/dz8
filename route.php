<?php
require 'api.php';

switch ($_SERVER['REQUEST_METHOD']) {
    case "GET" :
        $api = new api();
        $api->get();
        break;
    case "POST" :
        $api = new api();
        $api->post();
        break;
    case "PUT" :
        $api = new api();
        $api->put();
        break;
    case "DELETE" :
        $api = new api();
        $api->delete();
        break;
    default :
        $data = Goods::all();
        http_response_code(200);
        echo json_encode($data);
        break;
}