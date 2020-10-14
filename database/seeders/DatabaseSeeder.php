<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Durand',
            'email' => 'durand@chezlui.fr',
            'admin' => true,
            'password' => bcrypt('admin'),
            'email_verified_at' => Carbon::now(),
        ]);

        User::create([
            'name' => 'Dupont',
            'email' => 'dupont@chezlui.fr',
            'password' => bcrypt('user'),
            'email_verified_at' => Carbon::now(),
        ]);

        User::create([
            'name' => 'Martin',
            'email' => 'martin@chezlui.fr',
            'password' => bcrypt('user'),
            'email_verified_at' => Carbon::now(),
        ]);

        DB::table('regions')->insert([
            [
                'name' => 'Île-de-France',
                'code' => 11,
                'slug' => 'ile_de_france',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Centre-Val de Loire',
                'code' => 24,
                'slug' => 'centre',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bourgogne-Franche-Comté',
                'code' => 27,
                'slug' => 'bourgogne',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hauts-de-France',
                'code' => 32,
                'slug' => 'hauts_de_france',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Grand Est',
                'code' => 44,
                'slug' => 'grand_est',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pays de la Loire',
                'code' => 52,
                'slug' => 'pays_de_la_loire',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bretagne',
                'code' => 53,
                'slug' => 'bretagne',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nouvelle-Aquitaine',
                'code' => 75,
                'slug' => 'aquitaine',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Occitanie',
                'code' => 76,
                'slug' => 'occitanie',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Auvergne-Rhône-Alpes',
                'code' => 84,
                'slug' => 'auvergne',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => "Provence-Alpes-Côte d'Azur",
                'code' => 93,
                'slug' => 'provence',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Corse',
                'code' => 94,
                'slug' => 'corse',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Normandie',
                'code' => 28,
                'slug' => 'normandie',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('categories')->insert([
            ['name' => 'Véhicules', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Immobilier', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Animaux', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Services', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mobilier', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Vêtements', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Multimédia', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Loisirs', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Vacances', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Autres', 'created_at' => now(), 'updated_at' => now()]
        ]);

        // factory(App\Models\Ad::class, 40)->create();
        App\Models\AppModelsAd::factory()->count(40)->make();

        DB::table('uploads')->insert([
            [
                'filename' => 'lMA9WKWaAIQbXUvKskzUXPVvTuiAVu.png',
                'original_name' => 'lcd-32872_640.png',
                'index' => '',
                'ad_id' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'filename' => 'UNa9N1DFdCEcjW8rTrdsRA8knyk9t5.jpg',
                'original_name' => 'puzzle-1243091_640.jpg',
                'index' => '',
                'ad_id' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'filename' => 'hQfmnrndF9sc4LyU863HOMRvjVfAcg.png',
                'original_name' => 'rocking-horse-33719_640.png',
                'index' => '',
                'ad_id' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'filename' => 'iyvXQ5DTvA8a5pQiKEaLZDJBYH5bQV.jpg',
                'original_name' => 'room-1336497_640.jpg',
                'index' => '',
                'ad_id' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'filename' => 'UxQM0O8M6EaEaaEyLB55xTxE9sFF3P.jpg',
                'original_name' => 'teddy-1338895_640.jpg',
                'index' => '',
                'ad_id' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'filename' => 'HGTdP5oMzhVpOxpsLARXefAPhXhdh5.jpg',
                'original_name' => 'tricycle-691587_640.jpg',
                'index' => '',
                'ad_id' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'filename' => '1UHu4r3v1V9sFfJCGPwLrftDictRtC.jpg',
                'original_name' => 'workstation-336369_640.jpg',
                'index' => '',
                'ad_id' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'filename' => 'eBRC60HdOzLgNjdnhGXF2924BkD8Wj.jpg',
                'original_name' => 'yoga-3053487_640.jpg',
                'index' => '',
                'ad_id' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'filename' => 'UVKM4QzICVV7Md6wUSCLeuCWwb4gNu.jpg',
                'original_name' => 'alone-1869914_640.jpg',
                'index' => '',
                'ad_id' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'filename' => 'AiGOMDhpzLOTx31TYwy4eNgVb7jH21.jpg',
                'original_name' => 'backpack-1836594_640.jpg',
                'index' => '',
                'ad_id' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'filename' => 'i74BWGJeZXKNlGqs8o5plypTi9G7br.jpg',
                'original_name' => 'dog-1224267_640.jpg',
                'index' => '',
                'ad_id' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'filename' => '9cIx7bKaCr5nDi0BQqb03UvVugf3tH.png',
                'original_name' => 'gypsy-4006361_640.png',
                'index' => '',
                'ad_id' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'filename' => 'CN0V5gjRIOWPWW7rM3qZVDVuO1Gu1w.jpg',
                'original_name' => 'kitty-2948404_640.jpg',
                'index' => '',
                'ad_id' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'filename' => 'rrfs4iRK0A2eAfh4G6FXkhfB6FXwVy.jpg',
                'original_name' => 'large-home-389271_640.jpg',
                'index' => '',
                'ad_id' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // factory(App\Models\Message::class, 10)->create();
        App\Models\AppModelsMessage::factory()->count(10)->create();
    }
}
