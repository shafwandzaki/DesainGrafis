<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Desain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DesainController extends Controller
{
    public function index()
    {
        $desains = Desain::latest()->paginate(10);
        return view('admin.desain.index', compact('desains'));
    }

    public function create()
    {
        return view('admin.desain.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'desain'    => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'judul'     => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
        ]);

        $data['desain'] = $request->file('desain')->store('desain', 'public');

        Desain::create($data);

        return redirect()->route('admin.desain.index')
            ->with('success', 'Desain berhasil ditambahkan.');
    }

    public function edit(Desain $desain)
    {
        return view('admin.desain.edit', compact('desain'));
    }

    public function update(Request $request, Desain $desain)
    {
        $data = $request->validate([
            'desain'    => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'judul'     => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
        ]);

        if ($request->hasFile('desain')) {
            Storage::disk('public')->delete($desain->desain);
            $data['desain'] = $request->file('desain')->store('desain', 'public');
        } else {
            unset($data['desain']);
        }

        $desain->update($data);

        return redirect()->route('admin.desain.index')
            ->with('success', 'Desain berhasil diperbarui.');
    }

    public function destroy(Desain $desain)
    {
        Storage::disk('public')->delete($desain->desain);
        $desain->delete();

        return redirect()->route('admin.desain.index')
            ->with('success', 'Desain berhasil dihapus.');
    }
}