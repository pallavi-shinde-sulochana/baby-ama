<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserInfo;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
// use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        $demoUser = User::create([
            'first_name'        => $faker->firstName,
            'last_name'         => $faker->lastName,
            'email'             => 'demo@demo.com',
            'password'          => Hash::make('demo'),
            'email_verified_at' => now(),
        ]);

        

        $dummyInfo = [
            'company'  => $faker->company,
            'phone'    => 1234567890,
            'website'  => $faker->url,
            'language' => $faker->languageCode,
            'country'  => $faker->countryCode,
        ];

        $info = new UserInfo();
        foreach ($dummyInfo as $key => $value) {
            $info->$key = $value;
        }
        $info->user()->associate($demoUser);
        $info->save();



        // User::factory(1)->create();
        // dd(Role::all());

        $user = User::first();
        $user->assignRole('super-admin');


        // foreach (range(1,50) as $index) {
        //     $patient = User::create([
        //         'first_name'        => $faker->firstName,
        //         'last_name'         => $faker->lastName,
        //         'email'             => $faker->unique()->safeEmail,
        //         'password'          => null,
        //         'email_verified_at' => now(),
        //     ]);

        //     $info = new UserInfo();
        //     $info->phone = 

        // }
    }
}
