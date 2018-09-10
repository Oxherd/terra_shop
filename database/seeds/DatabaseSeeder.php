<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // $this->call(CategoryTableSeeder::class);
        // $this->call(ClassificationTableSeeder::class);
        // $this->call(ItemTableSeeder::class);
        // $this->call(TagTableSeeder::class);

        // \App\Item::all()->each(function ($item) {
        //     $randn = rand(1, count(\App\Tag::all()));
        //     $tag = \App\Tag::find($randn);
        //     $item->tags()->attach($tag);
        // });

        \App\User::create([
            'email' => 'admin@laraveladmin.com',
            'password' => bcrypt('password'),
            'name' => 'Admin',
            'is_admin' => true,
            ]);
    }
}
