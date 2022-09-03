<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
            return [
                'movie_id'=>'required',
                'quote_en'=>'required|max:255|min:4|unique:quotes,quote',
                'quote_ka'=>'required|max:255|min:4|unique:quotes,quote',
    
            ];
     
    }
}
