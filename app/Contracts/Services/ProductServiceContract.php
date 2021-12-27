<?php


namespace App\Contracts\Services;


interface ProductServiceContract
{
    public function getProductList($request);

    public function storeProduct($data);
}
