<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
        $rules = [
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category'  => 'required|exists:categories,slug',
            'tag'       => 'required|array|max:3',
            'tag.*'     => 'required|exists:tags,slug',
            'title'     => 'required',
            'slug'      => 'required|unique:blogs,slug',
            'body'      => 'required',
        ];

        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['category'] = 'required|exists:categories,slug';
            $rules['tag'] = 'required|array|max:3';
            $rules['tag.*'] = 'required|exists:tags,slug';
            $rules['title'] = 'required';
            $rules['slug'] = 'required|unique:blogs,slug,' . $this->blog->id; // Exclude current blog from unique check
            $rules['body'] = 'required';
        }

        return $rules;
    }
}
