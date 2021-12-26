<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\User;
use App\Models\City;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        City::truncate();
        Faculty::truncate();
        User::truncate();

        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $user3 = User::factory()->create();

        $city1 = City::create(['NazivGrada' => "Beograd", 'slug' => 'glavni']);
        $city2 = City::create(['NazivGrada' => "NoviSad", 'slug' => 'tmf']);
        $city3 = City::create(['NazivGrada' => "Cacak", 'slug' => 'juznapruga']);

        $faculty1 = Faculty::create([
            'ImeFakulteta' => 'Fakultet Organizacionih Nauka',
            'excerpt' => 'Work Post excerpt',
            'body' => 'najbolji najbolji najbolji',
            'slug' => 'work-post',
            'user_id' => $user1->id,
            'city_id' => $city2->id
        ]);

        $faculty2 = Faculty::create([
            'ImeFakulteta' => 'Pravni fakultet ',
            'excerpt' => 'Personal Post excerpt',
            'body' => 'Personal Post content',
            'slug' => 'personal-post',
            'user_id' => $user2->id,
            'city_id' => $city1->id
        ]);

        $faculty3 = Faculty::create([
            'ImeFakulteta' => 'Saobraćajni fakultet',
            'excerpt' => 'Fun Post excerpt',
            'body' => 'Fun Post content',
            'slug' => 'fun-post',
            'user_id' => $user3->id,
            'city_id' => $city3->id
        ]);






    }
}
