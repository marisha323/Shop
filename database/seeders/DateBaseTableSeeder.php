<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DateBaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        DB::table('users_roles')->insert([
//            ['name' => 'Admin', 'created_at' => now(), 'updated_at' => now()],
//            ['name' => 'User', 'created_at' => now(), 'updated_at' => now()],
//        ]);
         //Заповнення таблиці users
        DB::table('users')->insert([
            [
                'user_role_id' => 1,
                'name' => 'Марина',
                'email' => 'marisham1223@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('2502aFLG'), // Hash the password
                'remember_token' => Str::random(10),
                'profile_photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'code_mentor_id' => null, // Correct the column name here
            ],
            // Додайте більше користувачів тут
        ]);

//        DB::table('sizes')->insert([
//            [
//                'name' => 'XS',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'name' => 'S',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'name' => 'M',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'name' => 'L',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'name' => 'XL',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'name' => 'XXL',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'name' => 'XXXL',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//        ]);
//        DB::table('brands')->insert([
//            [
//                'name' => 'Hermes',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'name' => 'Chanel',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'name' => 'Gucci',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'name' => 'Prada',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'name' => 'Lady Dior',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'name' => 'Stefano Ricci',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'name' => 'Burberry',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//        ]);
//        DB::table('categories')->insert([
//            [
//                'title' => 'Handbag Hermes',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'title' => 'Handbag Chanel',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'title' => 'Handbag Gucci',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'title' => 'Glasses Prada',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'title' => 'Glasses Lady Dior',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'title' => 'Glasses Stefano Ricci',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'title' => 'Wallet Burberry',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'title' => 'Wallet Lady Dior',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'title' => 'Wallet Chanel',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//        ]);
//        DB::table('colors')->insert([
//            [
//                'name' => 'red',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'name' => 'orange',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'name' => 'yellow',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'name' => 'green',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'name' => 'blue',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'name' => 'purple',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'name' => 'pink',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'name' => 'white',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'name' => 'black',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//        ]);
//        DB::table('images')->insert([
//            [
//                'ImageUrl' => 'https://img.freepik.com/free-photo/cute-possum-wearing-goggles_23-2150953451.jpg',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'ImageUrl' => 'https://klike.net/uploads/posts/2022-08/1659335518_7.jpg',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'ImageUrl' => 'https://cojo.ru/wp-content/uploads/2022/12/lednikovyi-period-stolknovenie-neizbezhno-diego-2.webp',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//
//        ]);
//
//        DB::table('discount_products')->insert([
//            [
//                'discount' => 10,
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'discount' => 15,
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'discount' => 5,
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//
//        ]);
//


    }
}
