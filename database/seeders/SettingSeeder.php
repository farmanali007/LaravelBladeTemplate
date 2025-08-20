<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            [
                'key_name' => 'site_name',
                'value' => 'Laravel Learning Blog',
                'type' => 'string',
                'description' => 'Website name displayed in header and title',
            ],
            [
                'key_name' => 'site_description',
                'value' => 'Learn Laravel with practical examples and tutorials',
                'type' => 'string',
                'description' => 'Website description for SEO',
            ],
            [
                'key_name' => 'posts_per_page',
                'value' => '12',
                'type' => 'integer',
                'description' => 'Number of posts to display per page',
            ],
            [
                'key_name' => 'enable_comments',
                'value' => 'true',
                'type' => 'boolean',
                'description' => 'Enable or disable comments system',
            ],
            [
                'key_name' => 'enable_registration',
                'value' => 'true',
                'type' => 'boolean',
                'description' => 'Allow new user registrations',
            ],
            [
                'key_name' => 'social_links',
                'value' => json_encode([
                    'facebook' => 'https://facebook.com/laravel',
                    'twitter' => 'https://twitter.com/laravelphp',
                    'github' => 'https://github.com/laravel',
                    'youtube' => 'https://youtube.com/laravelphp',
                ]),
                'type' => 'json',
                'description' => 'Social media links for the website',
            ],
            [
                'key_name' => 'maintenance_mode',
                'value' => 'false',
                'type' => 'boolean',
                'description' => 'Enable maintenance mode',
            ],
            [
                'key_name' => 'contact_email',
                'value' => 'contact@example.com',
                'type' => 'string',
                'description' => 'Contact email for the website',
            ],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
