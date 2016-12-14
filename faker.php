<?php
require 'vendor/autoload.php';
require 'config.php';

//$categories = Category::find(6);
//$categories->delete();

$faker = Faker\Factory::create();

for ($a = 0; $a < 5; $a++) {

    $categories = new Category();
    $categories->category_name = $faker->word;
    $categories->save();

    $categories = Category::all();
    foreach ($categories as $category)
    $categories_id = $category->id;

//    print_r($categories_id);

    for ($i = 0; $i < 3; $i++) {

        $goods = new Goods();
        $goods->goods_name = $faker->word;
        $goods->categories_id = $categories_id;
        $goods->save();
    }

}