<?php

namespace Database\Seeders;

use App\Models\Follower;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            $following = $users->where('id', '!=', $user->id)->random(rand(2, 5));

            foreach ($following as $followed) {
                Follower::create([
                    'user_id' => $user->id,
                    'follower_id' => $followed->id,
                ]);
            }
        }
    }
}
