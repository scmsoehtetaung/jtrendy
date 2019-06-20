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
      //   DB::table('users')->insert([
      //       'name' => 'Aye Aye',
      //       'phone_number'=>'09966237551',
      //       'user_photo'=>'girl',
      //       'email' => 'aye@gmail.com',
      //       'password' => bcrypt('secret'),
      //       'user_type' => '1',
      //       'created_user'=>'0',
      //       'updated_user'=>'0',
      //       'created_at'=>'2019-5-19 06:56:01',
      //       'updated_at'=>'2019-5-20 06:56:01',

      //    ]);
         DB::table('users')->insert([
            'name' => 'Stella',
            'phone_number'=>'09866237552',
            'user_photo'=>'evy',
            'email' => 'stella@gmail.com',
            'password' => bcrypt('secret'),
            'user_type' => '2',
            'created_user'=>'1',
            'updated_user'=>'1',
            'created_at'=>'2019-5-19 06:56:01',
            'updated_at'=>'2019-5-20 06:56:01',

         ]);

         // DB::table('users')->insert([
         //    'name' => 'Stella',
         //    'phone_number'=>'09966237552',
         //    'email' => 'stella@gmail.com',
         //    'password' => bcrypt('secret'),
         //    'user_type' => '1',
         //    'created_at'=>'2019-3-1 05:00:00',
         //    'updated_at'=>'2019-8-16 12:03:56',

         // ]);
         
         // DB::table('users')->insert([
         //    'name' => 'John',
         //    'phone_number'=>'09966237553',
         //    'email' => 'john@gmail.com',
         //    'password' => bcrypt('secret'),
         //    'user_type' => '1',
         //    'created_at'=>'2019-9-9 11:35:09',
         //    'updated_at'=>'2019-12-30 23:45:40',

         // ]);

         // DB::table('users')->insert([
         //    'name' => 'Evy',
         //    'phone_number'=>'09966237554',
         //    'email' => 'evy@gmail.com',
         //    'password' => bcrypt('member'),
         //    'user_type' => '2',
         //    'created_at'=>'2019-6-09 09:00:01',
         //    'updated_at'=>'2019-9-16 3:28:36',

         // ]);

         // DB::table('users')->insert([
         //    'name' => 'Fanco',
         //    'phone_number'=>'09966237555',
         //    'email' => 'franco@gmail.com',
         //    'password' => bcrypt('member'),
         //    'user_type' => '2',
         //    'created_at'=>'2019-5-1 09:54:08',
         //    'updated_at'=>'2019-8-16 07:03:00',

         // ]);
    }
}
