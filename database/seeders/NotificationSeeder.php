<?php

namespace Database\Seeders;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        // Create notifications for each user
        foreach ($users as $user) {
            // Create 3-8 notifications per user
            $notificationCount = rand(3, 8);

            Notification::factory($notificationCount)->create([
                'user_id' => $user->id,
            ]);

            // Create some unread notifications
            Notification::factory(rand(1, 3))->unread()->create([
                'user_id' => $user->id,
            ]);

            // Create some with action buttons
            Notification::factory(rand(1, 2))->withAction()->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
