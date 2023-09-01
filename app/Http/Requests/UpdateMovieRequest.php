<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|numeric|min:0|exists:categories,id',
            'file' => 'required',
            'thumbnail' => 'required|string',
            'rating' => 'required|numeric|min:0',
            'serie_id' => 'required|numeric|min:0|exists:series,id',
            'date' => 'required',
        ];
    }
}
