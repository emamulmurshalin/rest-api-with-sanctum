<?php


namespace App\Contracts\Repository;


interface ProductRepositoryContract
{
    public function productList($request);

    public function storeData($data);
}
