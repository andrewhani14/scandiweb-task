<?php
require_once 'Config/dbc.php';
require_once 'ProductBuilder.php';

class ProductsController
{
    public static function fetchData() {
        $products = new Dbc;
        $results = $products->getData();
        return $results;
    }

    public static function create($input) {
        $prod = ProductBuilder::selectProduct($input);

        $create = new Dbc;
        $create->createData($prod);
    }

    public static function delete($checked) {
        $delete = new Dbc;
        $delete->deleteData($checked);
    }

}
