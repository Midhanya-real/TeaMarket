<?php

namespace App\Services\UpdateModelServices;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Services\UpdateModelServices\Interfaces\CategoryServiceInterface;
use Illuminate\Http\Request;

class CategoryService implements CategoryServiceInterface
{

    public function store(StoreCategoryRequest $request): bool
    {
        return Category::create([
            'name' => $request->name
        ]);
    }

    public function update(UpdateCategoryRequest $request, Category $category): bool
    {
        return $category->update([
            'name' => $request->name
        ]);
    }

    public function destroy(Request $request, Category $category): bool
    {
        return $request->user()->can('delete', $category)
            ? $category->delete()
            : false;
    }
}
