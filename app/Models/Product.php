<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



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

    /**
     * Store a new product.
     *
     * @param Request $request
     * @return Product
     * @throws ValidationException
     */

    public static function storeProduct(array $data): Product
    {
        return self::create($data);
    }

    /**
     * Update an existing product.
     *
     * @param Request $request
     * @param Product $product
     * @return bool
     * @throws ValidationException
     */

    public static function updateProduct(Product $product, array $data): bool
    {
        return $product->update($data);
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


    public static function deleteProduct(Product $product): bool
    {
        return $product->forceDelete(); // Use forceDelete() for hard delete
    }

    public static function totalActiveQuantity(): int
{
    return self::where('status', 1)->sum('quantity');
}

}
