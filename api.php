<?php
require 'vendor/autoload.php';
require 'config.php';


class api {

    public $id;

    public function get() {

        $id = $_REQUEST['id'];
        echo "<pre>";
        var_dump($_REQUEST);

        $data = Goods::find($id);
        if (!empty($data)) {
            http_response_code(200);
            echo json_encode($data);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'not found']);
        }

    }

    public function post() {

        $id = $_REQUEST['id'];
        var_dump($_REQUEST['id']);

        $faker = Faker\Factory::create();

        $data = new Goods();
        $data->goods_name = $faker->word;
        $data->categories_id = $id;
        $data->save();
        if (!empty($data)) {
            http_response_code(200);
            echo json_encode($data);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'not found']);
        }

    }

    public function put() {

        $id = $_REQUEST['id'];
        echo "<pre>";
        var_dump($_REQUEST);
        var_dump($_SERVER['REQUEST_METHOD']);

        $faker = Faker\Factory::create();

        $data = Goods::find($id);
        $data->goods_name = $faker->word;
        $data->save();
        var_dump($data);


    }

    public function delete() {

        $id = $_REQUEST['id'];

        $data = Goods::find($id);
        $data->delete();
        var_dump($data);
    }

}