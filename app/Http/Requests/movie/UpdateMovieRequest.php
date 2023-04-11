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
            'title.en' => "required",
            'title.ka' => "required",
        ];
    }

    public function messages(): array
    {
        return [
            'title.en' => __('form.movie.titleRequired'),
            'title.ka' => __('form.movie.titleGeoRequired')
        ];
    }
}
