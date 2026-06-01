<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.form', ['service' => new Service()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:120',
            'description' => 'required|string',
            'price'       => 'nullable|string|max:50',
            'icon'        => 'nullable|string|max:50',
            'active'      => 'boolean',
            'order'       => 'integer|min:0',
        ]);

        $data['active'] = $request->boolean('active');
        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Servizio creato!');
    }

    public function edit(Service $service)
    {
        return view('admin.services.form', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:120',
            'description' => 'required|string',
            'price'       => 'nullable|string|max:50',
            'icon'        => 'nullable|string|max:50',
            'active'      => 'boolean',
            'order'       => 'integer|min:0',
        ]);

        $data['active'] = $request->boolean('active');
        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Servizio aggiornato!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Servizio eliminato.');
    }
}
