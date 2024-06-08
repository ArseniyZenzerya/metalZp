<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class UpdateCategoryRequest extends FormRequest
    {
        public function authorize()
        {
            return true;
        }

        public function rules()
        {
            return [
                'meta_title' => 'nullable|string',
                'meta_description' => 'nullable|string',
                'meta_keywords' => 'nullable|string',
                'title' => 'required|string|max:191',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
        }
    }
