<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        if (Cache::has('products')) {
            $products = Cache::get('products');
        } else {
            $products = Product::select('id', 'name', 'description')->get();
            Cache::put('products', $products);
        }

        $users = User::all();

        return view('welcome', compact('products', 'users'));
    }

    public function markAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();

        return redirect()->back()->with('create', 'Notificaciones leidas');
    }

    public function readNotification(Request $request, $id)
    {
        auth()->user()->unreadNotifications
            ->when($request->id, fn ($query, $id) => $query->where('id', $id))->markAsRead();

        return redirect()->back()->with('create', 'Notificacion leída');
    }
}
