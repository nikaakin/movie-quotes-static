<?php

namespace App\Http\Requests\movie;

use Illuminate\Foundation\Http\FormRequest;
use Str;

class StoreMovieRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */

    public function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title['en'])
        ]);
    }

    public function rules(): array
    {
        return [
            'title.en' => "required",
            'title.ka' => "required",
            'slug' => "required|unique:movies,slug"
        ];
    }

    public function messages(): array
    {
        return [
            "title.en" => __('form.movie.titleRequired'),
            "title.ka" => __('form.movie.titleGeoRequired'),
        ];
    }
}
