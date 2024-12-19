<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;

class SiteController extends Controller
{
    //     public function index()
    // {
    //     $posts = Post::latest()->take(3)->get(); 

    //     return inertia('Home/Welcome', [
    //         'posts' => $posts,
    //     ]);
    // }

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


    // public function helpcenter()
    // {
    //     $sections =  FaqSection::all();
    //     $allFaqs = Faq::all();
    //     return view('site.helpcenter.index', compact('sections', 'allFaqs'));
    // }

    // public function helpcenterShow(FaqSection $section)
    // {
    //     $sections =  FaqSection::all();
    //     $allFaqs = Faq::all();
    //     return view('site.helpcenter.show', compact('section','sections', 'allFaqs'));
    // }

    // public function services()
    // {
    //     $services=[];
    //     return view('site.services.index', compact('services'));

    // }
}
