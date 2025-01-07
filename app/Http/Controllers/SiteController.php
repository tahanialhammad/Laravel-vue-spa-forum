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
    public function index()
    {
        $posts = Post::latest()
            ->take(3)
            ->get();

        $topics = Topic::take(6)->get();
        $marketings = Marketing::take(6)->get();

        return inertia('Home/Welcome', [
            'posts' => PostResource::collection($posts),
            'topics' => $topics,
            'marketings' => $marketings
        ]);
    }
    public function contact()
    {
        return inertia('Contact/Index');
    }
    public function store(Request $request)
    {
        $data =  $request->validate([
            'name' => 'required|string|max:20',
            'subject' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Mail::to('tahanina@yahoo.com')->send(new contactUs($data));

        return redirect()->route('contact')
        ->banner("Your email has been sent. We'll get back to you soon!.");
    }
}
