<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Message;
use App\Models\Booking;
use App\Models\Review;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $services  = Service::where('active', true)->orderBy('order')->take(3)->get();
        $portfolio = Portfolio::where('featured', true)->take(6)->get();
        $reviews   = Review::where('active', true)->orderBy('order')->take(6)->get();
        return view('public.home', compact('services', 'portfolio', 'reviews'));
    }

    public function services()
    {
        $services = Service::where('active', true)->orderBy('order')->get();
        return view('public.services', compact('services'));
    }

    public function portfolio()
    {
        $items = Portfolio::orderBy('created_at', 'desc')->get();
        return view('public.portfolio', compact('items'));
    }

    public function about()
    {
        $reviews = Review::where('active', true)->orderBy('order')->get();
        return view('public.about', compact('reviews'));
    }

    public function contact()
    {
        return view('public.contact');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:150',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string|max:2000',
        ]);

        $msg = Message::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'subject' => $request->subject ?? 'Nessun oggetto',
            'body'    => $request->message,
            'read'    => false,
        ]);

        try {
            \Mail::raw(
                "Nuovo messaggio da {$msg->name} ({$msg->email})\n\nOggetto: {$msg->subject}\n\n{$msg->body}",
                fn($m) => $m->to(config('admin.email'))->subject("Nuovo messaggio — {$msg->name}")
            );
        } catch (\Exception $e) {}

        return back()->with('success', 'Messaggio inviato! Ti risponderemo presto.');
    }

    public function pricing()
    {
        $services = Service::where('active', true)->orderBy('order')->get();
        return view('public.pricing', compact('services'));
    }

    public function booking()
    {
        $services = Service::where('active', true)->orderBy('order')->get();
        return view('public.booking', compact('services'));
    }

    public function storeBooking(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:100',
            'email'      => 'required|email|max:150',
            'phone'      => 'nullable|string|max:20',
            'service_id' => 'nullable|exists:services,id',
            'date'       => 'required|date|after:today',
            'time'       => 'required',
            'duration'   => 'required|integer|min:30|max:480',
            'notes'      => 'nullable|string|max:1000',
        ]);

        $booking = Booking::create($request->only([
            'name', 'email', 'phone', 'service_id', 'date', 'time', 'duration', 'notes'
        ]));

        try {
            \Mail::raw(
                "Ciao {$booking->name}!\n\nAbbiamo ricevuto la tua richiesta per il {$booking->date->format('d/m/Y')} alle {$booking->time}.\nTi contatteremo presto.\n\nLaFamiglia808",
                fn($m) => $m->to($booking->email)->subject('Richiesta ricevuta — LaFamiglia808')
            );
        } catch (\Exception $e) {}

        try {
            \Mail::raw(
                "Nuova prenotazione!\nNome: {$booking->name}\nEmail: {$booking->email}\nData: {$booking->date->format('d/m/Y')}\nOra: {$booking->time}",
                fn($m) => $m->to(config('admin.email'))->subject("Nuova prenotazione — {$booking->name}")
            );
        } catch (\Exception $e) {}

        return back()->with('success', 'Richiesta inviata! Ti contatteremo entro 24 ore per confermare.');
    }
}
