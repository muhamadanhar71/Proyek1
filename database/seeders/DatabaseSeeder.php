<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Muhamad anhar',
            'username' => 'anhar31',
            'email' => 'muhamadanhar@gmail.com',
            'password' => bcrypt('12345')
        ]);

        User::create([
            'name' => 'Audy R.H',
            'username' => 'audy',
            'email' => 'audy@gmail.com',
            'password' => bcrypt('12345')
        ]);

        Category::create([
            'name' => 'Web Programing',
            'slug' => 'web-programing'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::create([
            'title' => 'Judul pertama',
            'slug' => 'judul-pertama',
            'excerpt' =>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea, cumque!',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque accusantium voluptate quis corrupti impedit reiciendis quam quibusdam totam, et illo quisquam consequuntur Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque accusantium voluptate quis corrupti impedit reiciendis quam quibusdam totam, et illo quisquam consequuntur Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque accusantium voluptate quis corrupti impedit reiciendis quam quibusdam totam, et illo quisquam consequuntur Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque accusantium voluptate quis corrupti impedit reiciendis quam quibusdam totam, et illo quisquam consequuntur Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque accusantium voluptate quis corrupti impedit reiciendis quam quibusdam totam, et illo quisquam consequuntur Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque accusantium voluptate quis corrupti impedit reiciendis quam quibusdam totam, et illo quisquam consequuntur Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque accusantium voluptate quis corrupti impedit reiciendis quam quibusdam totam, et illo quisquam consequuntur Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque accusantium voluptate quis corrupti impedit reiciendis quam quibusdam totam, et illo quisquam consequuntur Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque accusantium voluptate quis corrupti impedit reiciendis quam quibusdam totam, et illo quisquam consequuntur Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque accusantium voluptate quis corrupti impedit reiciendis quam quibusdam totam, et illo quisquam consequuntur ', 
            'category_id' => 1,
            'user_id' => 1,
        ]);

        Post::create([
            'title' => 'Judul kedua',
            'slug' => 'judul-kedua',
            'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea, cumque!',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque accusantium voluptate quis corrupti impedit reiciendis quam quibusdam totam, et illo quisquam consequuntur Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque accusantium voluptate quis corrupti impedit reiciendis quam quibusdam totam, et illo quisquam consequuntur</p><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque accusantium voluptate quis corrupti impedit reiciendis quam quibusdam totam, et illo quisquam consequuntur Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque accusantium voluptate quis corrupti impedit reiciendis quam quibusdam totam, et illo quisquam consequuntur</p><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque accusantium voluptate quis corrupti impedit reiciendis quam quibusdam totam, et illo quisquam consequuntur Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque accusantium voluptate quis corrupti impedit reiciendis quam quibusdam totam, et illo quisquam consequuntur</p><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque accusantium voluptate quis corrupti impedit reiciendis quam quibusdam totam, et illo quisquam consequuntur</p>', 
            'category_id' => 1,
            'user_id' => 1
        ]);
        
        Post::create([
            'title' => 'Judul ketiga',
            'slug' => 'judul-ketiga',
            'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea, cumque!',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque accusantium voluptate quis corrupti impedit reiciendis quam quibusdam totam, et illo quisquam consequuntur Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque accusantium voluptate quis corrupti impedit reiciendis quam quibusdam totam, et illo quisquam consequuntur</p><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque accusantium voluptate quis corrupti impedit reiciendis quam quibusdam totam, et illo quisquam consequuntur Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque accusantium voluptate quis corrupti impedit reiciendis quam quibusdam totam, et illo quisquam consequuntur</p><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque accusantium voluptate quis corrupti impedit reiciendis quam quibusdam totam, et illo quisquam consequuntur Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque accusantium voluptate quis corrupti impedit reiciendis quam quibusdam totam, et illo quisquam consequuntur</p><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque accusantium voluptate quis corrupti impedit reiciendis quam quibusdam totam, et illo quisquam consequuntur</p>',
            'category_id' => 2,
            'user_id' => 2,
        ]);
    }
}
