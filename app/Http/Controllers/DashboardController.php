<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     

public function index(Request $request)
{
    $search = $request->input('search');

    $user = auth()->user();

    $query = $user->links()->orderBy('order');

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('url', 'like', "%{$search}%");
        });
    }

    $links = $query->get();

    return view('dashboard', compact('links', 'search'));
}

}
