<?php

namespace App\Services\UpdateModelServices\Interfaces;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

interface CategoryServiceInterface
{
    public function store(StoreCategoryRequest $request);

    public function update(UpdateCategoryRequest $request, Category $category);

    public function destroy(Request $request, Category $category);
}
