<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Mail\contactUs;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
// use App\Mail\ContactMe;
// use App\Mail\Contact;

class SiteController extends Controller
{
    public function index()
    {
        $posts = Post::latest()
            ->take(3)
            ->get();

        $topics = Topic::take(6)->get();
        return inertia('Home/Welcome', [
            'posts' => PostResource::collection($posts),
            'topics' => $topics
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

        // Mail::raw('it work', function($message){
        //     $message->to('tahanina@yahoo.com')->subject($data['subject']);
        // });

        Mail::to('tahanina@yahoo.com')->send(new contactUs($data));

        return redirect()->route('contact')->with('message', 'Email sent');
    }
}
