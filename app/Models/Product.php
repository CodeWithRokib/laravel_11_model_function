<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;




class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'status',
    ];

    final public function prepare_data(Request $request): array
    {
        return [
            'name'       => $request->input('name'),
            'description'       => $request->input('description'),
            'price' => $request->input('price'),
            'quantity'    => $request->input('quantity'),
            'status'      => $request->input('status'),
        ];
    }

    /**
     * Store a new product.
     *
     * @param Request $request
     * @return Product
     * @throws ValidationException
     */

    final public function storeProduct(Request $request): Builder|Model
    {
        return self::query()->create($this->prepare_data($request));
    }
   
    /**
     * Update an existing product.
     *
     * @param Request $request
     * @param Product $product
     * @return bool
     * @throws ValidationException
     */

    // public static function updateProduct(Product $product, array $data): bool
    // {
    //     return $product->update($data);
    // }
    final public function updateProduct(Request $request, Product|Model $product): bool
    {
        return $product->update($this->prepare_data($request));
    }

    /**
     * Delete a product.
     *
     * @param Product $product
     * @return void
     */
   

    /**
     * Find a product by ID.
     *
     * @param int $id
     * @return Product
     */
    public static function showProduct(int $id): Product
    {
        return self::findOrFail($id);
    }


    final public function deleteProduct(Product $product): bool
    {
        return $product->forceDelete(); // Use forceDelete() for hard delete
    }

    
    public function totalActiveQuantity(): int
    {
        return $this->where('status', 1)->sum('quantity');
    }
    
    public function totalActivePrice(): int
    {
        return $this->where('status', 1)->sum('price');
    }

    public function getNameAttribute($value)
    {
        return strtoupper($value); // Ensure name is always in uppercase
    }



}
