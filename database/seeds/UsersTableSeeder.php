<?php

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
        DB::table('users')->insert([
            'name' => 'Aye Aye',
            'phone_number'=>'09966237551',
            'user_photo'=>'girl.jpg',
            'email' => 'aye@gmail.com',
            'password' => bcrypt('secret'),
            'user_type' => '1',
            'gender'=>'1',
            'created_user'=>'0',
            'updated_user'=>'0',

         ]);
         DB::table('users')->insert([
            'name' => 'Stella',
            'phone_number'=>'09866237552',
            'user_photo'=>'stella.jpg',
            'email' => 'stella@gmail.com',
            'password' => bcrypt('secret'),
            'user_type' => '1',
            'gender'=>'1',
            'created_user'=>'0',
            'updated_user'=>'0',
         ]);

         DB::table('users')->insert([
            'name' => 'John',
            'phone_number'=>'09966237553',
            'user_photo'=>'john.jpg',
            'email' => 'john@gmail.com',
            'password' => bcrypt('secret'),
            'user_type' => '1',
            'gender'=>'0',
            'created_user'=>'0',
            'updated_user'=>'0',
         ]);

         DB::table('users')->insert([
            'name' => 'Evy',
            'phone_number'=>'09966237554',
            'user_photo'=>'evy.jpg',
            'email' => 'evy@gmail.com',
            'password' => bcrypt('member'),
            'user_type' => '2',
            'gender'=>'1',
            'created_user'=>'0',
            'updated_user'=>'0',
         ]);

         DB::table('users')->insert([
            'name' => 'Franco',
            'phone_number'=>'09966237555',
            'user_photo'=>'franco.jpg',
            'email' => 'franco@gmail.com',
            'password' => bcrypt('member'),
            'user_type' => '2',
            'gender'=>'0',
            'created_user'=>'0',
            'updated_user'=>'0',
         ]);
    }
}
