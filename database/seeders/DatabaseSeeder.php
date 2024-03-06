<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::create([
            'name' => 'Ade Rahmat Maulana',
            'email' => 'adermaulana15@gmail.com',
            'password' => bcrypt(12345678),
        ]);

        \App\Models\Post::create([
            'title' => 'Naruto',
            'slug' => 'naruto',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio optio ea corporis perferendis esse nisi, laboriosam, tenetur quos, id ullam possimus natus nostrum! Totam quae eius nobis pariatur mollitia. Est molestiae facere quisquam tempora recusandae et eum. Voluptates quod tenetur excepturi! Illo alias dolor cum itaque, provident quis at distinctio officiis, dolorum eius atque quas perspiciatis. Dolorem molestiae nesciunt sequi commodi quo, enim maxime vero optio quod iusto vitae inventore et mollitia dicta assumenda rem natus modi provident quibusdam dignissimos officia fuga saepe est illum. Voluptatem sunt expedita totam molestiae vero minus atque. At quia explicabo magnam ab. Odit, nesciunt.'
        ]);
    }
}
