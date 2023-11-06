<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Office;
use App\Models\Office_state;
use App\Models\Review;
use App\Models\Tag;
use App\Models\User;
use App\Models\user_type;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //Al iniciar una sesion php artisan tinker, si no se presenta data correr "composer dump-autoload" para generar nuevamente los archivos

        //generacion de datos de prueba
        User_type ::factory(10)->create();
        Office_state ::factory(10)->create();
        Tag ::factory(10)->create();

        //setteo de prueba con los datos generados
        User ::factory(10)->create()->each(function ($user) {
            $user->user_type_id = User_type::all()->random()->id;
            $user->office_state_id = Office_state::all()->random()->id;
        });
        Office ::factory(10)->create() ->each(function ($office) {
            $office->user_id = User::all()->random()->id;
            $office->office_state_id = Office_state::all()->random()->id;
            $office->tags()->attach(Office_state::all()->random()->id);
        });
        Review ::factory(10)->create() ->each(function ($review) {
            $review->user_id = User::all()->random()->id;
            $review->office_id = Office::all()->random()->id;
        });

    }
}
