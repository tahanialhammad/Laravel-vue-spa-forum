<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Mail\contactUs;
use App\Models\Marketing;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    // Display the homepage with the latest posts, topics, and marketings
    public function index()
    {
        // Fetch the latest 3 posts from the database
        $posts = Post::latest()
            ->take(3)
            ->get();

        // Fetch the top 6 topics from the database
        $topics = Topic::take(6)->get();
        // Fetch the top 6 marketing entries from the database
        $marketings = Marketing::take(6)->get();

        return inertia('Home/Welcome', [
            'posts' => PostResource::collection($posts),
            'topics' => $topics,
            'marketings' => $marketings
        ]);
    }
    // Display the contact page
    public function contact()
    {
        return inertia('Contact/Index');
    }
    // Handle the form submission for contacting
    public function store(Request $request)
    {
        $data =  $request->validate([
            'name' => 'required|string|max:20',
            'subject' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Send the validated data to the specified email address using the contactUs Mailable
        Mail::to('info@example.com')->send(new contactUs($data));

        // Redirect back to the contact page with a success banner message
        return redirect()->route('contact')
            ->banner("Your email has been sent. We'll get back to you soon!.");
    }
}
