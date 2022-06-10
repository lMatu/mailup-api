<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'price' => 'required|numeric',
            'price_sale' => 'required|numeric',
            'category_id' => 'required|integer',
            'stock' => 'required|integer',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Debe ingresar un nombre para el producto',
            'name.max' => 'El nombre es demasiado largo',
            'description.max' => 'El nombre es demasiado largo',
            'image.required' => 'Debe ingresar una imagen para el producto',
            'image.mimes' => 'El formato de la imagen es incorrecto',
            'image.image' => 'Debe enviar una imagen',
            'price.required' => 'Debe ingresar un precio para el producto',
            'price_sale.required' => 'Debe ingresar un precio de venta para el producto',
            'category_id.required' => 'Debe ingresar una categoria para el producto',
            'stock.required' => 'Debe ingresar el del stock para el producto',
            'category_id.integer' => 'La categoria debe ser un numero entero',
            'stock.integer' => 'El stock debe ser un numero entero',
            'price.numeric' => 'El formato del precio es incorrecto',
            'price_sale.numeric' => 'El formato del precio de venta es incorrecto',
        ];
    }

}
