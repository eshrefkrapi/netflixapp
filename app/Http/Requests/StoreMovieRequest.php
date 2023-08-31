<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize():bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules():array
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'file' => 'required',
            'thumbnail' => 'required',
            'rating' => 'required',
            'serie_id' => 'required',
            'date' => 'required',
        ];
    }
}
