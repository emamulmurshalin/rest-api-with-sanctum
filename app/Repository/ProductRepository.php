<?php


namespace App\Repository;


use App\Contracts\Repository\ProductRepositoryContract;
use App\Models\Product;

class ProductRepository extends BaseRepository implements ProductRepositoryContract
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function productList($request)
    {
        return $this->model->all();
    }

    public function storeData($data)
    {
        return $this->model->create($data);
    }

    public function getProductById($id)
    {
        return $this->model->find($id);
    }
}
