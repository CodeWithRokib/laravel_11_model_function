<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;


class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name','category_id'];

    public function prepare_data(Request $request): array
    {
       return [
        "name" => $request->input('name'),
        "category_id" => $request->input('category_id'),
       ];
    }

    public function storeSubCategory(Request $request): Builder|Model
    {
        return self::query()->create($this->prepare_data($request));
    }

    public function updateSubCategory(Request $request, SubCategory|Model $subcategory): bool
    {
        return $subcategory->update(attributes: $this->prepare_data($request));
    }

    public function deleteSubCategory(SubCategory $subcategory): bool
    {
        return $subcategory->forceDelete();
    }

    

}
