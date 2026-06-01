<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.messages.index', compact('messages'));
    }

    public function show(Message $message)
    {
        $message->update(['read' => true]);
        return view('admin.messages.show', compact('message'));
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Messaggio eliminato.');
    }

    public function markRead(Message $message)
    {
        $message->update(['read' => !$message->read]);
        return back()->with('success', 'Stato aggiornato.');
    }
}
