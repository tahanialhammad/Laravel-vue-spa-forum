<?php

namespace Database\Seeders;

use App\Models\Topic;
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
                'slug' => 'general',
                'name' => 'General',
                'description' => 'A broad topic for uncategorized or general discussions.',
                'image' => "https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/project-6-1-780x1109-1-430x611.jpg",
            ],
            [
                'slug' => 'corporate-identity',
                'name' => 'Corporate Identity',
                'description' => 'Topics related to branding and corporate identity development.',
                'image' => "https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/Corporate-Identity.jpg",
            ],
            [
                'slug' => 'ui-ux-design',
                'name' => 'UI/UX Design',
                'description' => 'Discussions about user interface and user experience design.',
                'image' => "https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/project-2-1-780x975-1-430x538.jpg",
            ],
            [
                'slug' => 'media-strategy',
                'name' => 'Media Strategy',
                'description' => 'Exploring strategies for effective media planning and execution.',
                'image' => "https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/project-6-1-780x1109-1-430x611.jpg",
            ],
            [
                'slug' => 'brand-promotion',
                'name' => 'Brand Promotion',
                'description' => 'Topics focused on growing and promoting brands effectively.',
                'image' => "https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/organizational-2-1100x619.jpg",
            ],
            [
                'slug' => 'full-development',
                'name' => 'Full Development',
                'description' => 'Covers comprehensive development processes, from start to finish.',
                'image' => "https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/project-2-1-780x975-1-430x538.jpg",
            ],
            [
                'slug' => 'photo-print',
                'name' => 'Photo & Print',
                'description' => 'Discussions around photography and print media.',
                'image' => "https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/09/1-430x287.jpg",
            ],
        ];
        // Insert or update topics in the database based on their slug
        Topic::upsert($data, ['slug']);
    }
}
