<?php


namespace App\Contracts\Repository;


interface ProductRepositoryContract
{
    public function productList($request);

    public function storeData($data);

    public function getProductById($id);

    public function getProductByName($name);
}
