<?php
require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'loftshop',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();


class Category extends Illuminate\Database\Eloquent\Model {
    public function goods() {
        return $this->hasMany('Goods');
    }
}

class Goods extends Illuminate\Database\Eloquent\Model {
    public function categories() {
        return $this->belongsTo('Category');
    }
}