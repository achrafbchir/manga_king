<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    protected $table = "mangas";

    protected $fillable = ["name", "other_names", "season", "mangaka", "synopsis", "image_id", "status", "type", "age_categorie", "publication_date", "visit_counter", "ratings_avg", "ratings_count"];

    #types
    const MANGA = "Manga", WEBTOON = "Webtoon", KOREAN_MANHWA = "Korean Manhwa", CHINESE_MANHWA = "Chinese Manhwa";

    #status
    const FINISHED = "finished", ON_GOING = "on going", NOT_RELEASED_YET = "not released yet", SUSPENDED = "suspended";

    const LIMIT_PAGINATOR = 10;
    
    public function Categories()
    {
        return $this->belongsToMany(Categorie::class);
    }
}
