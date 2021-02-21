<?php

use App\Categorie;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["Chounin", "Senin", "Comedy", "Slice of life", "Sport", "Psychological", "Thriller"];
        foreach($categories as $categorie)
        {
            Categorie::firstOrCreate(['name' => $categorie]);
        }
    }
}
