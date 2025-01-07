<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Http\Resources\TopicResource;
use App\Http\Resources\UserResource;
use App\Models\Marketing;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth()->user()->is_admin) {
            return $this->showAdminDashboard();
        }
        return $this->showUserDashboard();
    }

    private function showAdminDashboard()
    {
        $users = UserResource::collection(User::paginate(10));
        $topics = TopicResource::collection(Topic::all());
        $marketings = Marketing::all();
        $authUser = auth()->user();

        $myPosts = PostResource::collection( $authUser->posts()->latest()->get());

        return inertia('Admin/Dashboard', compact('users', 'topics', 'myPosts', 'marketings'));
    }

    private function showUserDashboard()
    {
        $authUser = auth()->user();

        $myPosts = PostResource::collection( $authUser->posts()->latest()->get());

        return inertia('User/Dashboard', compact('myPosts'));
    }
}
