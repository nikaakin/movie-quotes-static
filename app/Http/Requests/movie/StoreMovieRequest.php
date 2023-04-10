<?php

namespace App\Http\Requests\movie;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => "required|string|unique:movies,title",
            "slug" => "required|unique:movies,slug"
        ];
    }
}