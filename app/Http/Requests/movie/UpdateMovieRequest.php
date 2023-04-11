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
            'title.en' => "required|unique:movies,title," . $this->movie->id,
            'title.ka' => "required|unique:movies,title_geo," . $this->movie->id,
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
