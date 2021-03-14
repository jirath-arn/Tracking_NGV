<?php

namespace Database\Seeders;

use App\Models\Route;
use Illuminate\Database\Seeder;

class RoutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $routes = [
            [
                'id'         => 1,
                'name_route' => 'NGV 1A',
                'created_at' => '2020-12-15 08:39:28',
                'updated_at' => '2020-12-15 07:02:54',
            ],
            [
                'id'         => 2,
                'name_route' => 'NGV 1B',
                'created_at' => '2020-12-15 09:39:28',
                'updated_at' => '2020-12-15 08:02:54',
            ],
            [
                'id'         => 3,
                'name_route' => 'NGV 2',
                'created_at' => '2020-12-15 10:39:28',
                'updated_at' => '2020-12-15 09:02:54',
            ],
            [
                'id'         => 4,
                'name_route' => 'NGV 3',
                'created_at' => '2020-12-15 11:39:28',
                'updated_at' => '2020-12-15 10:02:54',
            ],
            [
                'id'         => 5,
                'name_route' => 'NGV 4',
                'created_at' => '2020-12-15 12:39:28',
                'updated_at' => '2020-12-15 11:02:54',
            ],
            [
                'id'         => 6,
                'name_route' => 'NGV 5',
                'created_at' => '2020-12-15 12:39:28',
                'updated_at' => '2020-12-15 11:02:54',
            ],
        ];

        Route::insert($routes);
    }
}
