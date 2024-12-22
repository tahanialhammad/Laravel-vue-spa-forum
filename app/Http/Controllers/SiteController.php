<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Mail\contactUs;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
// use App\Mail\ContactMe;
// use App\Mail\Contact;

class SiteController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'topic'])
            ->latest()
            ->take(3)
            ->get();
            
        return inertia('Home/Welcome', [
            'posts' => PostResource::collection($posts),
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
            'email'=>'required|email',
            'message' => 'required|string',
        ]);

        // Mail::raw('it work', function($message){
        //     $message->to('tahanina@yahoo.com')->subject($data['subject']);
        // });
        // Mail::raw('It works', function ($message) use ($data) {
        //     $message->to('tahanina@yahoo.com')->subject($data['subject']);
        // });
      //  dd($data['email']);
      Mail::to('tahanina@yahoo.com')->send(new contactUs($data));

        return redirect()->route('contact')->with('message', 'Email sent');

        //V-4-7 send html email using email class and html templat in email1->contact-me
        // Mail::to(request('email'))->send(new ContactMe('email 1 topic'));

        // return redirect('/contact')
        // ->with('message', 'Email sent');

        //V-8 use new markdown template
        // Mail::to(request('email'))->send(new Contact('email 1 topic'));

        // return redirect('/contact')
        // ->with('message', 'Email sent');

    }

}
