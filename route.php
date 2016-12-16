<?php
require 'api.php';

switch ($_REQUEST['name']) {
    case "getGoods" :
        $api = new api();
        $api->get();
        break;
    case "getCategories" :
        $api = new api();
        $api->post();
        break;
    case "putGoods" :
        $api = new api();
        $api->put();
        break;
    case "delGoods" :
        $api = new api();
        $api->delete();
        break;
    default :
        $data = Goods::all();
        http_response_code(200);
        echo json_encode($data);
        break;
}