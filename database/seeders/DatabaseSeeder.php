<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
            ProductSeeder::class,
            OrderSeeder::class,
            SettingSeeder::class,
            NotificationSeeder::class,
        ]);
    }
}
