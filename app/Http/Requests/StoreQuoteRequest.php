<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreQuoteRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "movie_id" => ['required', Rule::exists('movies', 'id')],
            "movie_slug" => ['required'],
            "photo" => ['image'],
            'quote' => ['array', 'required'],
        ];
    }

    public function passedValidation(): void
    {
        $this->merge([
            'photo' => $this->file('photo'),
        ]);
    }
}
