<?php

namespace App\Http\Controllers;

use App\Contracts\Services\ProductServiceContract;
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

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
