<?php

namespace App\Http\Requests;

// use Illuminate\Foundation\Http\FormRequest;
use  App\Http\Requests\FormRequest;

class CoursesRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|string|min:10',
            'bio'=>'nullable|string|min:15',
            'cover'=>'nullable|file|mimes:jpg,bmp,png,jpge',
            'track_id'=>'exists:tracks,id'
        ];
    }
}
