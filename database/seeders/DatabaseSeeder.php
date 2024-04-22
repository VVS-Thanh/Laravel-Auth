<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\table;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // $groupId = DB::table('groups')->insertGetId([
        //     'name' => 'Administrators',
        //     'user_id' => 0,
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);

        // DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // if($groupId > 0){
        //     $userId = DB::table('users')->insertGetId([
        //         'name' => 'Thế Thanh',
        //         'email' => 'btthanh111@gmail.com',
        //         'password' => Hash::make('123456'),
        //         'group_id' => $groupId,
        //         'user_id' => 0,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s')
        //     ]);

        //     if($userId > 0){
        //         for ($i = 1; $i <= 5; $i++){
        //             DB::table('posts')->insert([
        //                 'title' => 'the name of a book, composition, or other artistic work',
        //                 'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        //                             Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley
        //                             of type and scrambled it to make a type specimen book.',
        //                 'user_id' => $userId,
        //                 'created_at' => date('Y-m-d H:i:s'),
        //                 'updated_at' => date('Y-m-d H:i:s')
        //             ]);
        //     }
        //     }
        // }

        // DB::table('modules')->insert([
        //     'name' => 'users',
        //     'title' => 'Quản lý người dùng',
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);
        // DB::table('modules')->insert([
        //     'name' => 'groups',
        //     'title' => 'Quản lý nhóm người dùng',
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);
        // DB::table('modules')->insert([
        //     'name' => 'posts',
        //     'title' => 'Quản lý bài viết',
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);

    }
}

