<?php

namespace App\Http\Controllers;

use App\Contracts\Services\ProductServiceContract;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function Symfony\Component\Translation\t;

class ProductController extends BaseController
{
    private $service;
    public function __construct(ProductServiceContract $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        return $this->returnApiResponse($this->service->getProductList($request));
    }

    public function store(ProductRequest $request) : JsonResponse
    {
        return $this->returnApiResponse($this->service->storeProduct($request));
    }

    public function show($id) : JsonResponse
    {
        return $this->returnApiResponse($this->service->getProductById($id));
    }

    public function update(ProductRequest $request, $id) : JsonResponse
    {
        return $this->returnApiResponse($this->service->updateProduct($request, $id));
    }

    public function destroy($id)
    {
        return $this->returnApiResponse($this->service->deleteProduct($id));
    }
}
