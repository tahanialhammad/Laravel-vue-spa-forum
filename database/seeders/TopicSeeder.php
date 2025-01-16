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
                'image' => "https://img.freepik.com/free-photo/medium-shot-business-people-working-together_23-2150384862.jpg?t=st=1737037588~exp=1737041188~hmac=6d301397d8f4f68671f2d8869bde96f65f564c6e97316e2282c71f0859150a6c&w=900",
            ],
            [
                'slug' => 'corporate-identity',
                'name' => 'Corporate Identity',
                'description' => 'Topics related to branding and corporate identity development.',
                'image' => "https://img.freepik.com/free-vector/flat-mosaic-brand-stationery-collection_23-2149049871.jpg?t=st=1737038153~exp=1737041753~hmac=88042b388d7c1b70a0e94cc1e2a802b862b708471c1ec95f180ac3609a10b460&w=826",
            ],
            [
                'slug' => 'ui-ux-design',
                'name' => 'UI/UX Design',
                'description' => 'Discussions about user interface and user experience design.',
                'image' => "https://img.freepik.com/free-vector/gradient-ui-ux-elements-background_23-2149056159.jpg?t=st=1737038668~exp=1737042268~hmac=aa5e79b1de04e67ac09f8c291cfb3e92674b23db81941a334ed304a7684210e2&w=900",
            ],
            [
                'slug' => 'media-strategy',
                'name' => 'Media Strategy',
                'description' => 'Exploring strategies for effective media planning and execution.',
                'image' => "https://img.freepik.com/free-photo/map-lying-wooden-table_53876-105723.jpg?t=st=1737038710~exp=1737042310~hmac=03b3d6fd7e065e3a41588cdafedc85f75395228a78b13b662c61a82ea934d785&w=900",
            ],
            [
                'slug' => 'brand-promotion',
                'name' => 'Brand Promotion',
                'description' => 'Topics focused on growing and promoting brands effectively.',
                'image' => "https://img.freepik.com/free-photo/diverse-people-thinking-planning-marketing-brand-concept_53876-64952.jpg?t=st=1737038748~exp=1737042348~hmac=2e4fc540a74cf0ecd640255a003307881cb54850914154dd7f6327e26725d519&w=826",
            ],
            [
                'slug' => 'full-development',
                'name' => 'Full Development',
                'description' => 'Covers comprehensive development processes, from start to finish.',
                'image' => "https://img.freepik.com/free-photo/operation-process-performance-development-icon_53876-16541.jpg?t=st=1737038818~exp=1737042418~hmac=076909e77f5f2532e0dc3f4d3c634347f0a36ad64d8deab1e4bc9d4a0a51b92b&w=826",
            ],
            [
                'slug' => 'photo-print',
                'name' => 'Photo & Print',
                'description' => 'Discussions around photography and print media.',
                'image' => "https://img.freepik.com/free-vector/instagram-profile-picture-design_742173-15372.jpg?t=st=1737038853~exp=1737042453~hmac=16b7769acc59e6f45f2e85517bfd0598ec8c345aeeac1bb8965a37001ae33edf&w=740",
            ],
        ];
        // Insert or update topics in the database based on their slug
        Topic::upsert($data, ['slug']);
    }
}
