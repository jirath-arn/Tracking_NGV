<?php

namespace Database\Seeders;

use App\Models\Bus;
use Illuminate\Database\Seeder;

class BusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buses = [
            [
                'id'            => 1,
                'route_id'      => 1,
                'license_plate' => 'กด 1152',
                'latitude'      => '14.0674266',
                'longitude'     => '100.6078051',
                'created_at'    => '2020-12-15 01:41:03',
                'updated_at'    => '2020-12-15 01:41:03',
            ],
            [
                'id'            => 2,
                'route_id'      => 1,
                'license_plate' => 'ดด 5555',
                'latitude'      => '14.0674804',
                'longitude'     => '100.6041214',
                'created_at'    => '2020-12-15 01:41:10',
                'updated_at'    => '2020-12-15 01:41:10',
            ],
            [
                'id'            => 3,
                'route_id'      => 2,
                'license_plate' => 'งพ 1523',
                'latitude'      => '14.0720963',
                'longitude'     => '100.6059213',
                'created_at'    => '2020-12-15 01:41:21',
                'updated_at'    => '2020-12-15 01:41:21',
            ],
            [
                'id'            => 4,
                'route_id'      => 1,
                'license_plate' => 'หห 1253',
                'latitude'      => '14.0696533',
                'longitude'     => '100.6016447',
                'created_at'    => '2020-12-15 01:41:31',
                'updated_at'    => '2020-12-15 01:41:31',
            ],
            [
                'id'            => 5,
                'route_id'      => 4,
                'license_plate' => 'สส 5566',
                'latitude'      => '14.0720919',
                'longitude'     => '100.6075727',
                'created_at'    => '2020-12-15 11:21:35',
                'updated_at'    => '2020-12-15 11:21:35',
            ],
        ];

        Bus::insert($buses);
    }
}
