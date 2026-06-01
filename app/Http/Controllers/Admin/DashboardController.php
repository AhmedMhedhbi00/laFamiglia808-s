<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Message;
use App\Models\Booking;
use App\Models\Review;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'services'        => Service::count(),
            'portfolio'       => Portfolio::count(),
            'messages'        => Message::count(),
            'unread_messages' => Message::where('read', false)->count(),
            'bookings'        => Booking::count(),
            'pending_bookings'=> Booking::where('status', 'pending')->count(),
            'reviews'         => Review::count(),
        ];
        $recentMessages = Message::orderBy('created_at', 'desc')->take(5)->get();
        $recentBookings = Booking::with('service')->orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages', 'recentBookings'));
    }
}
