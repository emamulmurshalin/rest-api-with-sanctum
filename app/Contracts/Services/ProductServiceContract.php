<?php


namespace App\Contracts\Services;


interface ProductServiceContract
{
    public function getProductList($request);

    public function storeProduct($data);

    public function getProductById($id);

    public function updateProduct($data, $id);

    public function deleteProduct($id);

    public function searchProduct($search);
}
