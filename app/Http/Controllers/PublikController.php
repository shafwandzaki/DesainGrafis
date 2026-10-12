<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Desain;
use App\Models\Tools;
use App\Models\Karya;

class PublikController extends Controller
{
    public function app()
    {
        return view('app', [
            'home'   => $this->home(),
            'desain' => $this->desain(),
            'tools'  => $this->tools(),
            'karya'  => $this->karya(),
        ]);
    }

    private function home(): array
    {
        $home = Home::first();

        // Jika admin belum mengisi konten home, tetap tampil dengan nilai default (tidak error)
        return [
            'title'          => $home?->title ?? 'Nama Kamu',
            'tagline'        => $home?->tagline ?? 'Desainer Grafis',
            'deskripsi'      => $home?->deskripsi ?? '',
            'link_linkedin'  => $home?->link_linkedin ?? '#',
            'link_email'     => $home?->link_email ?? '',
            'link_instagram' => $home?->link_instagram ?? '#',
        ];
    }

    private function desain(): array
    {
        return Desain::latest()->get()->map(function ($desain) {
            return [
                'desain'    => asset('storage/' . $desain->desain),
                'download'  => asset('storage/' . ($desain->desain_original ?: $desain->desain)),
                'judul'     => $desain->judul,
                'deskripsi' => $desain->deskripsi,
            ];
        })->toArray();
    }

    private function tools(): array
    {
        return Tools::orderBy('kategori')->orderByDesc('percent')->paginate(10)->map(function ($tools) {
            return [
                'icon_tools' => asset('storage/' . $tools->icon_tools),
                'nama_tools' => $tools->nama_tools,
                'kategori'   => $tools->kategori,
                'percent'    => $tools->percent,
            ];
        })->toArray();
    }

    private function karya(): array
    {
        return Karya::latest()->get()->map(function ($karya) {
            return [
                'img_karya'  => asset('storage/' . $karya->img_karya),
                'nama_karya' => $karya->nama_karya,
                'deskripsi'  => $karya->deskripsi,
                'link_karya' => $karya->link_karya, // bisa null
            ];
        })->toArray();
    }
}