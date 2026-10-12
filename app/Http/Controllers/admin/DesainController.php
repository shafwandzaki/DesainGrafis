<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Desain;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\Format;
use Intervention\Image\ImageManager;

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

        $data = array_merge($data, $this->simpanGambar($request->file('desain'), $data['judul']));

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
            $this->hapusGambar($desain);
            $data = array_merge($data, $this->simpanGambar($request->file('desain'), $data['judul']));
        } else {
            unset($data['desain']);
        }

        $desain->update($data);

        return redirect()->route('admin.desain.index')
            ->with('success', 'Desain berhasil diperbarui.');
    }

    public function destroy(Desain $desain)
    {
        $this->hapusGambar($desain);
        $desain->delete();

        return redirect()->route('admin.desain.index')
            ->with('success', 'Desain berhasil dihapus.');
    }

    /**
     * Simpan file asli apa adanya + buat versi WebP yang ringan untuk ditampilkan.
     * Return: ['desain' => path webp, 'desain_original' => path file asli]
     */
    private function simpanGambar(UploadedFile $file, string $judul): array
    {
        $disk = Storage::disk('public');
        $nama = Str::slug($judul) . '-' . Str::random(6);

        // 1) File asli (untuk download)
        $pathAsli = $file->storeAs('desain/original', $nama . '.' . $file->extension(), 'public');

        // 2) Versi WebP (untuk tampil di web)
        $manager = ImageManager::usingDriver(GdDriver::class);

        $webp = $manager->decodePath($file->getRealPath())
            ->scaleDown(width: 1600)    // kecilkan jika lebih lebar dari 1600px (tidak memperbesar)
            ->encodeUsingFormat(Format::WEBP, quality: 80);

        $pathWebp = 'desain/' . $nama . '.webp';
        $disk->put($pathWebp, (string) $webp);

        return [
            'desain'          => $pathWebp,
            'desain_original' => $pathAsli,
        ];
    }

    /** Hapus versi WebP dan file asli (data lama mungkin belum punya file asli). */
    private function hapusGambar(Desain $desain): void
    {
        $disk = Storage::disk('public');

        $disk->delete($desain->desain);

        if ($desain->desain_original) {
            $disk->delete($desain->desain_original);
        }
    }
}