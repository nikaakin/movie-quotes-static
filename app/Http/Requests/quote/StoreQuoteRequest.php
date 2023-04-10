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
        // dd('w');
        return [
            "movie_id" => ['required', Rule::exists('movies', 'id')],
            "movie_slug" => ['required'],
            "photo" => ['image', 'required'],
            'quote.ka' => ['required'],
            'quote.en' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'quote.ka' => __('form.quote.kaRequired'),
            'quote.en' => __('form.quote.enRequired'),
        ];
    }

    public function passedValidation(): void
    {
        $this->merge([
            'photo' => $this->file('photo'),
        ]);
    }
}
