<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeContentController extends Controller
{
    // Tabel homes hanya berisi 1 baris. Kalau belum ada, dibuat otomatis.
    private function getHome(): Home
    {
        return Home::firstOrCreate([], [
            'title'          => 'Title',
            'tagline'        => 'Desainer Grafis',
            'deskripsi'      => 'Tulis deskripsi singkat tentang kamu di sini.',
            'link_linkedin'  => 'https://linkedin.com/in/username',
            'link_email'     => 'email@example.com',
            'link_instagram' => 'https://instagram.com/username',
        ]);
    }

    public function edit()
    {
        return view('admin.home.edit', ['home' => $this->getHome()]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'title'          => ['required', 'string', 'max:255'],
            'tagline'        => ['required', 'string', 'max:255'],
            'deskripsi'      => ['required', 'string'],
            'link_linkedin'  => ['required', 'url', 'max:255'],
            'link_email'     => ['required', 'email', 'max:255'],
            'link_instagram' => ['required', 'url', 'max:255'],
        ]);

        $this->getHome()->update($data);

        return redirect()->route('admin.home.edit')
            ->with('success', 'Konten home berhasil diperbarui.');
    }
}