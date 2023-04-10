<?php

namespace App\Http\Requests\quote;

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
        //!!  WIP 
        // dd('ssss');
        return [
            "movie_id" => ['required', Rule::exists('movies', 'id')],
            "movie_slug" => ['required'],
            "photo" => ['image', 'required'],
            'quote.ka' => ['required'],
            'quote.en' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'quote.ka' => 'required newnenwnenwnenwn',
            'quote.en' => 'required newnenwnenwnenwn',
        ];
    }

    public function passedValidation(): void
    {
        $this->merge([
            'photo' => $this->file('photo'),
        ]);
    }
}
