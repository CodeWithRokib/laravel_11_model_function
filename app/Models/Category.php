<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    final public function prepare_data(Request $request): array{
          return [ 
              "name" => $request->input('name'),
          ];
    }

    final public function getAllCategories(){
        return $this->all();
    }

    final public function storeCategory(Request $request): Builder|Model 
    {
         return self::query()->create($this->prepare_data($request));
    }
    
    final public function updateCategory(Request $request, Category|Model $category): bool
    {
     return $category->update($this->prepare_data($request));
    }

    final public function deleteCategory(Category $category): bool 
    {
        return $category->forceDelete();
    }


}
