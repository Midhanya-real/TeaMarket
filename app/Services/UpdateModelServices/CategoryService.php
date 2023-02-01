<?php

namespace App\Services\UpdateModelServices;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Services\UpdateModelServices\Interfaces\CategoryServiceInterface;
use Illuminate\Http\Request;

class CategoryService implements CategoryServiceInterface
{

    public function store(StoreCategoryRequest $request)
    {
        return Category::create([
            'name' => $request->name
        ]);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        return $category->update([
            'name' => $request->name
        ]);
    }

    public function destroy(Request $request, Category $category)
    {
        return $request->user()->can('delete', $category)
            ? $category->delete()
            : false;
    }
}
