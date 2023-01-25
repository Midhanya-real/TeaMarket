<?php

namespace App\Http\Controllers;

use App\Repository\ProductRepository;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __construct(
        private ProductRepository $repository
    )
    {
    }

    public function index(string $brand)
    {
        return $this->repository->getByBrand($brand);
    }
}
