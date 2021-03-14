<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Seeder;

class StationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stations = [
            [
                'id'           => 1,
                'name_station' => 'คณะวารสาร (JC)',
                'latitude'     => '14.0675060',
                'longitude'    => '100.6048500',
                'created_at'   => '2020-12-15 00:00:00',
                'updated_at'   => '2020-12-15 00:00:00',
            ],
            [
                'id'           => 2,
                'name_station' => 'อาคารเรียนรวม SC',
                'latitude'     => '14.0695520',
                'longitude'    => '100.6017100',
                'created_at'   => '2020-12-15 00:00:01',
                'updated_at'   => '2020-12-15 00:00:01',
            ],
            [
                'id'           => 3,
                'name_station' => 'คณะวิทยาศาสตร์ (บร.1)',
                'latitude'     => '14.0721320',
                'longitude'    => '100.6026226',
                'created_at'   => '2020-12-15 00:00:02',
                'updated_at'   => '2020-12-15 00:00:02',
            ],
            [
                'id'           => 4,
                'name_station' => 'คณะวิทยาศาสตร์ (บร.2)',
                'latitude'     => '14.0722017',
                'longitude'    => '100.6042500',
                'created_at'   => '2020-12-15 00:00:03',
                'updated_at'   => '2020-12-15 00:00:03',
            ],
            [
                'id'           => 5,
                'name_station' => 'คณะวิทยาศาสตร์ (บร.3)',
                'latitude'     => '14.0721648',
                'longitude'    => '100.6060973',
                'created_at'   => '2020-12-15 00:00:04',
                'updated_at'   => '2020-12-15 00:00:04',
            ],
            [
                'id'           => 6,
                'name_station' => 'คณะวิทยาศาสตร์ (บร.4)',
                'latitude'     => '14.0721626',
                'longitude'    => '100.6082298',
                'created_at'   => '2020-12-15 00:00:05',
                'updated_at'   => '2020-12-15 00:00:05',
            ],
            [
                'id'           => 7,
                'name_station' => 'คณะวิศวกรรมศาสตร์',
                'latitude'     => '14.0673845',
                'longitude'    => '100.6067624',
                'created_at'   => '2020-12-15 00:00:06',
                'updated_at'   => '2020-12-15 00:00:06',
            ],
            [
                'id'           => 8,
                'name_station' => 'Green Canteen',
                'latitude'     => '14.0727142',
                'longitude'    => '100.6015662',
                'created_at'   => '2020-12-15 00:00:07',
                'updated_at'   => '2020-12-15 00:00:07',
            ],
            [
                'id'           => 9,
                'name_station' => 'อินเตอร์โซน',
                'latitude'     => '14.0761709',
                'longitude'    => '100.5984588',
                'created_at'   => '2020-12-15 00:00:08',
                'updated_at'   => '2020-12-15 00:00:08',
            ],
            [
                'id'           => 10,
                'name_station' => 'หอในโซน C',
                'latitude'     => '14.0732569',
                'longitude'    => '100.5968072',
                'created_at'   => '2020-12-15 00:00:09',
                'updated_at'   => '2020-12-15 00:00:09',
            ],
            [
                'id'           => 11,
                'name_station' => 'อาคาร 14 ชั้น',
                'latitude'     => '14.0711967',
                'longitude'    => '100.5977465',
                'created_at'   => '2020-12-15 00:00:10',
                'updated_at'   => '2020-12-15 00:00:10',
            ],
            [
                'id'           => 12,
                'name_station' => 'คณะนิติศาสตร์',
                'latitude'     => '14.0675638',
                'longitude'    => '100.6031093',
                'created_at'   => '2020-12-15 00:00:11',
                'updated_at'   => '2020-12-15 00:00:11',
            ],
            [
                'id'           => 13,
                'name_station' => 'ท่ารถตู้ ธรรมศาสตร์ (รังสิต)',
                'latitude'     => '14.0673801',
                'longitude'    => '100.6081472',
                'created_at'   => '2020-12-15 00:00:12',
                'updated_at'   => '2020-12-15 00:00:12',
            ],
            [
                'id'           => 14,
                'name_station' => 'สระว่ายน้ำ มหาวิทยาลัยธรรมศาสตร์',
                'latitude'     => '14.0663430',
                'longitude'    => '100.6027857',
                'created_at'   => '2020-12-15 00:00:13',
                'updated_at'   => '2020-12-15 00:00:13',
            ],
            [
                'id'           => 15,
                'name_station' => 'Puey Ungphakorn Library',
                'latitude'     => '14.0712864',
                'longitude'    => '100.6017052',
                'created_at'   => '2020-12-15 00:00:14',
                'updated_at'   => '2020-12-15 00:00:14',
            ],
            [
                'id'           => 16,
                'name_station' => 'หอพระ',
                'latitude'     => '14.0716663',
                'longitude'    => '100.6015678',
                'created_at'   => '2020-12-15 00:00:15',
                'updated_at'   => '2020-12-15 00:00:15',
            ],
            [
                'id'           => 17,
                'name_station' => 'SIIT',
                'latitude'     => '14.0674833',
                'longitude'    => '100.6070656',
                'created_at'   => '2020-12-15 00:00:16',
                'updated_at'   => '2020-12-15 00:00:16',
            ],
            [
                'id'           => 18,
                'name_station' => 'ตึกปิยะชาติ',
                'latitude'     => '14.0721263',
                'longitude'    => '100.6131420',
                'created_at'   => '2020-12-15 00:00:17',
                'updated_at'   => '2020-12-15 00:00:17',
            ],
            [
                'id'           => 19,
                'name_station' => 'รพ.ธรรมศาสตร์ฯ',
                'latitude'     => '14.0731969',
                'longitude'    => '100.6162348',
                'created_at'   => '2020-12-15 00:00:18',
                'updated_at'   => '2020-12-15 00:00:18',
            ],
            [
                'id'           => 20,
                'name_station' => 'เชียงราก 1',
                'latitude'     => '14.0664000',
                'longitude'    => '100.6050014',
                'created_at'   => '2020-12-15 00:00:19',
                'updated_at'   => '2020-12-15 00:00:19',
            ],
            [
                'id'           => 21,
                'name_station' => 'TU-Dome',
                'latitude'     => '14.0660683',
                'longitude'    => '100.6005724',
                'created_at'   => '2020-12-15 00:00:20',
                'updated_at'   => '2020-12-15 00:00:20',
            ],
            [
                'id'           => 22,
                'name_station' => 'วงเวียนสถาบันเอเชีย',
                'latitude'     => '14.0753792',
                'longitude'    => '100.6016809',
                'created_at'   => '2020-12-15 00:00:21',
                'updated_at'   => '2020-12-15 00:00:21',
            ],
            [
                'id'           => 23,
                'name_station' => 'โรงพิมพ์ มหาวิทยาลัยธรรมศาสตร์',
                'latitude'     => '14.0673694',
                'longitude'    => '100.6095475',
                'created_at'   => '2020-12-15 00:00:22',
                'updated_at'   => '2020-12-15 00:00:22',
            ],
            [
                'id'           => 24,
                'name_station' => 'ศูนย์ประชุมฯ มหาวิทยาลัยธรรมศาสตร์',
                'latitude'     => '14.0692609',
                'longitude'    => '100.6160991',
                'created_at'   => '2020-12-15 00:00:23',
                'updated_at'   => '2020-12-15 00:00:23',
            ],
            [
                'id'           => 25,
                'name_station' => 'โรงอาหาร SC',
                'latitude'     => '14.0693923',
                'longitude'    => '100.6042131',
                'created_at'   => '2020-12-15 00:00:24',
                'updated_at'   => '2020-12-15 00:00:24',
            ],
            [
                'id'           => 26,
                'name_station' => 'คณะสถาปัตยกรรมศาสตร์',
                'latitude'     => '14.0681493',
                'longitude'    => '100.6087603',
                'created_at'   => '2020-12-15 00:00:25',
                'updated_at'   => '2020-12-15 00:00:25',
            ],
        ];

        Station::insert($stations);
    }
}
