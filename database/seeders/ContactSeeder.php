<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         
        User::factory(50)->create()->each(function ($user) {
            Contact::factory()->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
