<?php

namespace barrilete\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class galleryPhotosRequest extends FormRequest
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
            'gallery_id' => 'required',
            'title[*]' => 'required|min:20|max:191|unique:gallery_photos',
            'photo[*]' => 'required|image|mimes:jpeg,png,jpg|max:1024'
        ];
    }
}
