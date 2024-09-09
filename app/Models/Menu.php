<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
            'menu_id',
            'name',
            'route',
            'icon',
            'sort_order',
            'status',
            ];

            public static function storeMenu(array $data): Menu
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

            public static function updateMenu(Menu $menu, array $data): bool
            {
                return $menu->update($data);
            }

}
