<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'slug' => 'html-css',
                'name' => 'HTML & CSS',
                'description' => 'All about the building blocks of the web - HTML and CSS.',
            ],
            [
                'slug' => 'javascript',
                'name' => 'JavaScript',
                'description' => 'Discussions and questions about JavaScript, the language of the web.',
            ],
            [
                'slug' => 'frontend-frameworks',
                'name' => 'Frontend Frameworks',
                'description' => 'Talk about frameworks like React, Angular, Vue.js, and others.',
            ],
            [
                'slug' => 'backend-development',
                'name' => 'Backend Development',
                'description' => 'Dive into server-side languages and frameworks like Node.js, Django, Laravel, and more.',
            ],
            [
                'slug' => 'databases',
                'name' => 'Databases',
                'description' => 'Everything related to databases - SQL, NoSQL, database design, and optimization.',
            ],
            [
                'slug' => 'ui-ux-design',
                'name' => 'UI/UX Design',
                'description' => 'Talk about user interface and user experience design principles and tools.',
            ],
        ];

        Topic::upsert($data, ['slug']);
    }
}