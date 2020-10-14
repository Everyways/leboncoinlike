<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use Carbon\Carbon;
use App\Models\AppModelsRegion;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppModelsAdFactory extends Factory
{

    public function getRandGeo($url)
    {
        $results = file_get_contents($url);
        $elements = json_decode($results, true);
        $id = rand(0, count($elements) - 1);
        return $elements[$id];
    }

    public function definition()
    {
        $region_id = rand(1, 12);
        $region_code = AppModelsRegion::find($region_id)->code;
        $departement = $this->getRandGeo('https://geo.api.gouv.fr/regions/' . $region_code . '/departements');
        $commune = $this->getRandGeo('https://geo.api.gouv.fr/departements/' . $departement['code'] . '/communes');
        $obsolete = rand(0, 1);
        return [
            'title' => $this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'texte' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'category_id' => rand(1, 10),
            'region_id' => $region_id,
            'user_id' => rand(2, 3),
            'departement' => $departement['code'],
            'commune' => $commune['code'],
            'commune_name' => $commune['nom'],
            'commune_postal' => $commune['codesPostaux'][0],
            'pseudo' => $this->faker->word,
            'email' => $this->faker->email,
            'limit' => $obsolete ? Carbon::now()->subDayss(rand(1, 30)) : Carbon::now()->addWeeks(rand(1, 4)),
            'active' => rand(0, 1),
        ];
    }
}
