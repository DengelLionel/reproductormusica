<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SongsRequest extends FormRequest
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
            "album_id"=>"required",
            "artist_id"=>"integer",
            "title"=>"required",
            "length"=>"required",
            "track"=>"integer",
            "disc"=>"required|integer",
            "lyrics"=>"required",
            "path"=>"required|max:40240",
            "mtime"=>"required|integer",
        ];
    }
}
