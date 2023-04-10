<?php

namespace App\Http\Requests\movie;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => "required|string|unique:movies,title.ka",
            'title_geo' => "required|string|unique:movies,title.en",
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => __('form.movie.titleRequired'),
            'title_geo.required' => __('form.movie.titleGeoRequired')
        ];
    }
}
