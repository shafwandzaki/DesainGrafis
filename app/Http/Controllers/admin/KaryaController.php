<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Karya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KaryaController extends Controller
{
    public function index()
    {
        $karyas = Karya::latest()->paginate(10);
        return view('admin.karya.index', compact('karyas'));
    }

    public function create()
    {
        return view('admin.karya.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'img_karya'  => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'nama_karya' => ['required', 'string', 'max:255'],
            'deskripsi'  => ['required', 'string'],
            'link_karya' => ['nullable', 'url', 'max:255'],
        ]);

        $data['img_karya'] = $request->file('img_karya')->store('karya', 'public');

        Karya::create($data);

        return redirect()->route('admin.karya.index')
            ->with('success', 'Karya berhasil ditambahkan.');
    }

    public function edit(Karya $karya)
    {
        return view('admin.karya.edit', compact('karya'));
    }

    public function update(Request $request, Karya $karya)
    {
        $data = $request->validate([
            'img_karya'  => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'nama_karya' => ['required', 'string', 'max:255'],
            'deskripsi'  => ['required', 'string'],
            'link_karya' => ['nullable', 'url', 'max:255'],
        ]);

        if ($request->hasFile('img_karya')) {
            Storage::disk('public')->delete($karya->img_karya);
            $data['img_karya'] = $request->file('img_karya')->store('karya', 'public');
        } else {
            unset($data['img_karya']);
        }

        $karya->update($data);

        return redirect()->route('admin.karya.index')
            ->with('success', 'Karya berhasil diperbarui.');
    }

    public function destroy(Karya $karya)
    {
        Storage::disk('public')->delete($karya->img_karya);
        $karya->delete();

        return redirect()->route('admin.karya.index')
            ->with('success', 'Karya berhasil dihapus.');
    }
}