<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Page;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Coach Mohammed',
            'phone' => '01021727101',
            'password' => 'Coach123',
            'role' => 'coach',
        ]);
        
        Setting::create([
            'site_name' =>  'AAA',
            'address'   =>  'Giza , Egypt',
            'phone'     =>  '01063153994',
            'email'     =>  'amrachraf6690@gmail.com',
            'facebook'  =>  'https://facebook.com/amrachraf6690',
            'twitter'   =>  'https://x.com/amrachraf6690',
            'instagram' =>  'https://instagram.com/amrachraf6690',
            'youtube'   =>  'https://www.youtube.com/@amrachraf6699',
        ]);

        // for ($i = 0; $i < 10; $i++) {
        //     Page::create([
        //         'title' => 'Page ' . $i,
        //         'slug' => 'page-' . $i,
        //         'content' => 'This is the content of page ' . $i,
        //     ]);
        // }
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
