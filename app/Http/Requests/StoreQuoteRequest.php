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
            'quote_en' => ['required', 'string', 'max:255', 'min:3'],
            'quote_ka' => ['required', 'string', 'max:255', 'min:3'],
            'quote' => [],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'quote' => ['en' => $this->quote_en, "ka" => $this->quote_ka],
        ]);
    }

    public function passedValidation(): void
    {
        $this->merge([
            'photo' => $this->file('photo'),
        ]);
    }
}
