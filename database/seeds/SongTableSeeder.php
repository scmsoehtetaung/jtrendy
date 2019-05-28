<?php

use Illuminate\Database\Seeder;

class SongTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('song')->insert([
        'title' => 'Memories Again',
        'artist' =>'Aili',
        'category' =>'Pop',
        'description'=>'title:Memories Again,artist:Aili,category:Pop',
        'video_path'=>'D:\video',
        'song_react_count'=>'23',
        'song_download_count'=>'4',
        'created_user'=>'1',
        'updated_user'=>'1',
        'created_at'=>'2019-5-19 06:56:01',
        'updated_at'=>'2019-5-20 06:56:01',

         ]);
         DB::table('song')->insert([
            'title' => 'Miss You',
            'artist' =>'Aili',
            'category' =>'Classic',
            'description'=>'title:Miss You,artist:Aili,category:Pop',
            'video_path'=>'D:\video',
            'song_react_count'=>'22',
            'song_download_count'=>'9',
            'created_user'=>'2',
            'updated_user'=>'2',
            'created_at'=>'2019-5-02 06:56:01',
            'updated_at'=>'2019-5-02 06:56:01',
    
             ]);
             DB::table('song')->insert([
                'title' => 'This L.U.V',
                'artist' =>'Aili',
                'category' =>'Pop',
                'description'=>'title:This L.U.V,artist:Aili,category:Pop',
                'video_path'=>'D:\video',
                'song_react_count'=>'11',
                'song_download_count'=>'6',
                'created_user'=>'3',
                'updated_user'=>'3',
                'created_at'=>'2019-5-06 06:56:01',
                'updated_at'=>'2019-5-06 06:56:01',
        
                 ]);
                 DB::table('song')->insert([
                    'title' => 'Alone Again',
                    'artist' =>'Yuna Ito',
                    'category' =>'Pop',
                    'description'=>'title:Alone Again,artist:Yuna Ito,category:Pop',
                    'video_path'=>'D:\video',
                    'song_react_count'=>'24',
                    'song_download_count'=>'6',
                    'created_user'=>'4',
                    'updated_user'=>'4',
                    'created_at'=>'2019-6-01 06:56:01',
                    'updated_at'=>'2019-6-01 06:56:01',
            
                     ]);
                     DB::table('song')->insert([
                        'title' => 'Suki Na Hito Ga Iru(ost)',
                        'artist' =>'JY',
                        'category' =>'Pop',
                        'description'=>'title:Suki Na Hito Ga Iru(ost),artist:Aili,category:Pop',
                        'video_path'=>'D:\video',
                        'song_react_count'=>'10',
                        'song_download_count'=>'3',
                        'created_user'=>'5',
                        'updated_user'=>'5',
                        'created_at'=>'2019-7-01 06:56:01',
                        'updated_at'=>'2019-7-01 06:56:01',
                
                         ]);

}
}
