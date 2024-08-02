<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'zulhusni',
            'email' => 'zulhusni@gmail.com',
            'password' => bcrypt('123')
        ]);

        User::create([
            'name' => 'doddy',
            'email' => 'zulhusniq@gmail.com',
            'password' => bcrypt('12q3')
        ]);

        Category::create([
            'name' => 'Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::create([
            'title' => 'Article 1',
            'slug' => 'article-1',
            'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque, quis consequuntur sunt neque asperiores distinctio eligendi provident ducimus quaerat fugit?',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam doloremque quae iste porro, architecto praesentium, libero eius molestias neque quia quasi animi tempore. Soluta sit vero harum nostrum deleniti. Dignissimos quidem dolor est sed repellendus? Dolores libero fugiat obcaecati fuga voluptates minus nesciunt dolorum facilis corporis tenetur incidunt laudantium atque perspiciatis, facere culpa expedita, odit repellat odio autem, natus delectus sapiente sequi dolor. Voluptates blanditiis architecto quibusdam praesentium fugiat, et placeat aliquam quasi non odio cum aperiam, harum aliquid unde? Inventore dolorem commodi reiciendis qui quis doloribus sed eveniet, optio ex, corporis vitae. Sed harum nisi ut! Quis, ex in.',
            'category_id' => '1',
            'user_id' => '1',
        ]);

        Post::create([
            'title' => 'Article 2',
            'slug' => 'article-2',
            'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque, quis consequuntur sunt neque asperiores distinctio eligendi provident ducimus quaerat fugit?',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam doloremque quae iste porro, architecto praesentium, libero eius molestias neque quia quasi animi tempore. Soluta sit vero harum nostrum deleniti. Dignissimos quidem dolor est sed repellendus? Dolores libero fugiat obcaecati fuga voluptates minus nesciunt dolorum facilis corporis tenetur incidunt laudantium atque perspiciatis, facere culpa expedita, odit repellat odio autem, natus delectus sapiente sequi dolor. Voluptates blanditiis architecto quibusdam praesentium fugiat, et placeat aliquam quasi non odio cum aperiam, harum aliquid unde? Inventore dolorem commodi reiciendis qui quis doloribus sed eveniet, optio ex, corporis vitae. Sed harum nisi ut! Quis, ex in.',
            'category_id' => '1',
            'user_id' => '1',
        ]);

        Post::create([
            'title' => 'Article 3',
            'slug' => 'article-3',
            'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque, quis consequuntur sunt neque asperiores distinctio eligendi provident ducimus quaerat fugit?',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam doloremque quae iste porro, architecto praesentium, libero eius molestias neque quia quasi animi tempore. Soluta sit vero harum nostrum deleniti. Dignissimos quidem dolor est sed repellendus? Dolores libero fugiat obcaecati fuga voluptates minus nesciunt dolorum facilis corporis tenetur incidunt laudantium atque perspiciatis, facere culpa expedita, odit repellat odio autem, natus delectus sapiente sequi dolor. Voluptates blanditiis architecto quibusdam praesentium fugiat, et placeat aliquam quasi non odio cum aperiam, harum aliquid unde? Inventore dolorem commodi reiciendis qui quis doloribus sed eveniet, optio ex, corporis vitae. Sed harum nisi ut! Quis, ex in.',
            'category_id' => '2 ',
            'user_id' => '1',
        ]);

        Post::create([
            'title' => 'Article 4',
            'slug' => 'article-4',
            'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque, quis consequuntur sunt neque asperiores distinctio eligendi provident ducimus quaerat fugit?',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam doloremque quae iste porro, architecto praesentium, libero eius molestias neque quia quasi animi tempore. Soluta sit vero harum nostrum deleniti. Dignissimos quidem dolor est sed repellendus? Dolores libero fugiat obcaecati fuga voluptates minus nesciunt dolorum facilis corporis tenetur incidunt laudantium atque perspiciatis, facere culpa expedita, odit repellat odio autem, natus delectus sapiente sequi dolor. Voluptates blanditiis architecto quibusdam praesentium fugiat, et placeat aliquam quasi non odio cum aperiam, harum aliquid unde? Inventore dolorem commodi reiciendis qui quis doloribus sed eveniet, optio ex, corporis vitae. Sed harum nisi ut! Quis, ex in.',
            'category_id' => '2 ',
            'user_id' => '2',
        ]);
    }
}
