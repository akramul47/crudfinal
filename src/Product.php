<?php

namespace Bitm;

use PDO;

class Product
{
    public function index()
    {
        session_start();

        $conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM `product` WHERE is_deleted = 0";

        $stmt = $conn->prepare($query);

        $result = $stmt->execute();

        $products = $stmt->fetchAll();

        return $products;
    }
}
