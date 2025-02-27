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
    // Display the dashboard based on user role (admin or regular user)
    public function index()
    {
        if (Auth()->user()->is_admin) {
            // Show the admin dashboard if the user is an admin
            return $this->showAdminDashboard();
        }
        // Show the regular user dashboard if the user is not an admin
        return $this->showUserDashboard();
    }

    private function showAdminDashboard()
    {
        // Retrieve and paginate users, transforming them into a resource collection
        $users = UserResource::collection(User::paginate(10));
        // Retrieve all topics and transform them into a resource collection
        $topics = TopicResource::collection(Topic::all());
        // Retrieve all marketing entries from the database
        $marketings = Marketing::all();
        $authUser = auth()->user();

        // Retrieve the authenticated user's posts, ordered by latest, and transform into a resource collection
        $myPosts = PostResource::collection($authUser->posts()->latest()->get());

        return inertia('Admin/Dashboard', compact('users', 'topics', 'myPosts', 'marketings'));
    }

    private function showUserDashboard()
    {
        $authUser = auth()->user();

        $myPosts = PostResource::collection($authUser->posts()->latest()->get());

        return inertia('User/Dashboard', compact('myPosts'));
    }
}
