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
            'slug' => Str::slug($this->title)
        ]);
    }

    public function rules(): array
    {
        return [
            'title' => "required|string|unique:movies,title",
            'title_geo' => "required|string|unique:movies,title_geo",
            'slug' => "required"
        ];
    }

    public function messages(): array
    {
        return [
            "title.required" => __('form.movie.titleRequired'),
            "title_geo.required" => __('form.movie.titleGeoRequired'),
        ];
    }
}
