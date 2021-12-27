<?php


namespace App\Services;


use App\Contracts\Repository\ProductRepositoryContract;
use App\Contracts\Services\ProductServiceContract;
use App\Repository\ProductRepository;
use Illuminate\Http\Response;

class ProductService implements ProductServiceContract
{
    private $repository;
    public function __construct(ProductRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function getProductList($request)
    {
        $responce = $this->repository->productList($request);
        if ($responce){
            return getFormattedResponseData($responce, 'Product data get successfully', true, Response::HTTP_OK);
        }
        return getFormattedResponseData([], 'Product data not found.', false, Response::HTTP_NOT_FOUND);
    }

    public function storeProduct($request)
    {
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'price' => $request->price,
        ];
        $responce = $this->repository->storeData($data);
        if ($responce){
            return getFormattedResponseData($responce, 'Product created successfully', true, Response::HTTP_OK);
        }
        return getFormattedResponseData([], 'Something went wrong.', false, Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
