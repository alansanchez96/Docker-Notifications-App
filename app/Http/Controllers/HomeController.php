<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::select('id', 'name', 'description')->get();

        return view('welcome', compact('products'));
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
