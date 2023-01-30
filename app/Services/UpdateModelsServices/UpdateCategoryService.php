<?php

namespace App\Services\UpdateModelsServices;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class UpdateCategoryService
{
    public function create(StoreCategoryRequest $request): array
    {
        return [
            'name' => $request->name
        ];
    }

    public function update(UpdateCategoryRequest $request): array
    {
        return [
            'name' => $request->name
        ];
    }
}
