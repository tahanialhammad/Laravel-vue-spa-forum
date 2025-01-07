<?php

namespace App\Http\Controllers;

use App\Models\Marketing;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function storeMarketing(Request $request)
    {
        $data =  $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('marketing', 'public');
        }

        $marketing = Marketing::create([
            ...$data,
            'image' => $imagePath,
        ]);
        // use slug 
        return redirect()->route('dashboard')
            ->banner('Marketing item created successfully!');
    }

    public function destroyMarketing(Request $request, Marketing $marketing)
    {
        $marketing->delete();
        return back()->banner('Marketing item deleted successfully!');
    }
}
