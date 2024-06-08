<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class StoreProductRequest extends FormRequest
    {
        public function authorize()
        {
            return false;
        }

        public function rules()
        {
            return [
                'meta_title' => 'nullable|string',
                'meta_description' => 'nullable|string',
                'meta_keywords' => 'nullable|string',
                'title' => 'required|string|max:191',
                'description' => 'required|string',
                'id_categories' => 'required|exists:categories,id',
                'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
        }
    }
