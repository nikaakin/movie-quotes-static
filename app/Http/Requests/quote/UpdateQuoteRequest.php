<?php

namespace App\Http\Requests\quote;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuoteRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'quote' => ['required', 'array'],
            'photo' => 'image',
            'movie_id' => 'required',
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
