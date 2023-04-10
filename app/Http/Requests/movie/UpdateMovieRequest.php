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
            "slug" => "required|unique:movies,slug," . $this->movie->id,
            "title" => "required|unique:movies,title," . $this->movie->id,
        ];
    }
}
