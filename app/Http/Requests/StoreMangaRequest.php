<?php

namespace App\Http\Requests;

use App\Manga;
use Illuminate\Foundation\Http\FormRequest;

class StoreMangaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name"             => "required|unique:mangas,name",
            "season"           => "nullable",
            "other_names"      => "nullable|array",
            "other_names.*"    => "nullable|distinct",
            "mangaka"          => "nullable",
            "synopsis"         => "nullable",
            "image_id"         => "nullable|file",
            "type"             => "required|in:".implode(",", Manga::TYPES),
            "status"           => "required|in:".implode(",", Manga::STATUES),
            "age_categorie"    => "required|in:".implode(",", Manga::AGE_CATEGORIES),
            "publication_date" => "nullable|date_format:d/m/Y"
        ];
    }
}
