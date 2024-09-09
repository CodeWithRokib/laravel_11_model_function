<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

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

            final public function prepare_data(Request $request): array {
                return  [
                      "name" => $request->input('name'),
                      "route" => $request->input('route'),
                      "icon" => $request->input('icon'),
                      "sort_order" => $request->input('sort_order'),
                      "status" => $request->input('status'),
                    //   "user_id" => auth()->id(),
                ];
            }

            final public function storeMenu(Request $request): Builder|Model
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

            public static function updateMenu(Menu $menu, array $data): bool
            {
                return $menu->update($data);
            }

            public static function deleteMenu(Menu $menu): bool
            {
                return $menu->forceDelete(); // Use forceDelete() for hard delete
            }

}
