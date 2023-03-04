<?php
require_once 'Classes/dvd.php';
require_once 'Classes/furniture.php';
require_once 'Classes/book.php';
require_once 'Classes/product.php';
require_once 'Factories/DVDFactory.php';
require_once 'Factories/BookFactory.php';
require_once 'Factories/FurnitureFactory.php';

class ProductBuilder
{
    public static function selectProduct($data) {
        $factory_class = ucfirst($data['productType']) . 'Factory';
        $product = $factory_class::create($data);
        return $product;
    }

}
?>