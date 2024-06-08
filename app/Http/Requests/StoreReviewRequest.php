<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class StoreReviewRequest extends FormRequest
    {
        public function authorize()
        {
            return true;
        }

        public function rules()
        {
            return [
                'rating' => 'required|integer|between:1,5', // Assuming rating is between 1 and 5
                'name' => 'required|string|max:191',
                'comment' => 'required|string',
                'id_products' => 'required|exists:products,id', // Ensure this matches the field name and table structure
            ];
        }
    }
