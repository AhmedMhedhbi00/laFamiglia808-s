<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('service')->orderBy('date', 'desc')->orderBy('time', 'desc')->paginate(20);
        return view('admin.bookings.index', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        $booking->load('service');
        return view('admin.bookings.show', compact('booking'));
    }

    public function confirm(Booking $booking)
    {
        $booking->update(['status' => 'confirmed']);

        // Send confirmation email if mail is configured
        try {
            \Mail::raw(
                "Ciao {$booking->name},\n\nLa tua prenotazione per il {$booking->date->format('d/m/Y')} alle {$booking->time} è stata CONFERMATA.\n\nA presto,\nLaFamiglia808",
                fn($m) => $m->to($booking->email)->subject('Prenotazione Confermata — LaFamiglia808')
            );
        } catch (\Exception $e) { /* mail not configured, skip */ }

        return back()->with('success', 'Prenotazione confermata! Email inviata al cliente.');
    }

    public function cancel(Booking $booking)
    {
        $booking->update(['status' => 'cancelled']);

        try {
            \Mail::raw(
                "Ciao {$booking->name},\n\nCi dispiace, la tua prenotazione per il {$booking->date->format('d/m/Y')} alle {$booking->time} è stata annullata.\n\nContattaci per fissare un altro appuntamento.\n\nLaFamiglia808",
                fn($m) => $m->to($booking->email)->subject('Prenotazione Annullata — LaFamiglia808')
            );
        } catch (\Exception $e) { /* skip */ }

        return back()->with('success', 'Prenotazione annullata.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('admin.bookings.index')->with('success', 'Prenotazione eliminata.');
    }
}
