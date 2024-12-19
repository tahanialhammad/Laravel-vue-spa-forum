<?php

namespace App\Http\Controllers;

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
        return inertia('Admin/Dashboard');
    }

    private function showUserDashboard()
    {
        return inertia('User/Dashboard');
    }
}
