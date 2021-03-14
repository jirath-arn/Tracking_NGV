<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id'                => 1,
                'name'              => 'สหัสวรรษ คิวเจริญ',
                'email'             => 'realma2545@gmail.com',
                'email_verified_at' => null,
                'password'          => '$2y$10$GFkj.TymmcbL1sNaQ0hIJOkMVRJ7a5ZSq69WD7YHQkva6jFmpEL/.',
                'remember_token'    => null,
                'created_at'        => '2020-11-20 07:57:32',
                'updated_at'        => '2020-11-20 07:57:32',
            ],
            [
                'id'                => 2,
                'name'              => 'สหัสวรรษ คิวเจริญ',
                'email'             => 'sahatsawat.kew@dome.tu.ac.th',
                'email_verified_at' => null,
                'password'          => '$2y$10$rHdeZSdsBu7p.G3N2N8TUOK7Rgn8ljqB/fH6ztSWrwew3./7SUJWi',
                'remember_token'    => null,
                'created_at'        => '2020-12-15 11:16:58',
                'updated_at'        => '2020-12-15 11:16:58',
            ],
            [
                'id'                => 3,
                'name'              => 'Tester',
                'email'             => 'qwerty@gmail.com',
                'email_verified_at' => null,
                'password'          => '$2y$10$5lptjOWZqOFiu.7agz3g2uUBQo0xAZKnXwtvrNZeAhNzWpPAErudS',
                'remember_token'    => null,
                'created_at'        => '2020-12-15 20:07:42',
                'updated_at'        => '2020-12-15 20:07:42',
            ],
        ];

        User::insert($users);
    }
}
