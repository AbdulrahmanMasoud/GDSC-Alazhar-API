<?php

namespace App\Http\Requests;

// use Illuminate\Foundation\Http\FormRequest;
use  App\Http\Requests\FormRequest;

class EventRequest extends FormRequest
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
            'title'=>'required|string|min:10',
            'description'=>'nullable|string|min:50',
            'event_date' => 'required|date|after:tomorrow',
            'cover'=>'nullable|file|mimes:jpg,bmp,png,jpge',
            'latitude'=>'required|numeric|min:4',
            'longitude'=>'required|numeric|min:4',
            'status'=>'boolean',
        ];
    }
}
