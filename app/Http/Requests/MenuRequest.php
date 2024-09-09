<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'menu_id'    => 'nullable|integer|exists:menus,id',  // The foreign key for the menu
            'name'           => 'required|string|max:500',
            'route'          => 'required|string|min:0',
            'icon'           => 'required|string|min:0',
            'sort_order'     => 'required|integer|min:1',
            'status'         => 'required|integer'
        ];
    }
}
