<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ToolsController extends Controller
{
    public function index()
    {
        $tools = Tools::latest()->paginate(10);
        return view('admin.tools.index', compact('tools'));
    }

    public function create()
    {
        return view('admin.tools.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'icon_tools' => ['required', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
            'nama_tools' => ['required', 'string', 'max:255'],
            'kategori'   => ['required', 'string', 'max:255'],
            'percent'    => ['required', 'integer', 'min:0', 'max:100'],
        ]);

        $data['icon_tools'] = $request->file('icon_tools')->store('tools', 'public');

        Tools::create($data);

        return redirect()->route('admin.tools.index')
            ->with('success', 'Tools berhasil ditambahkan.');
    }

    // Catatan: Route::resource('tools') menghasilkan parameter {tool}, jadi variabelnya $tool
    public function edit(Tools $tool)
    {
        return view('admin.tools.edit', compact('tool'));
    }

    public function update(Request $request, Tools $tool)
    {
        $data = $request->validate([
            'icon_tools' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
            'nama_tools' => ['required', 'string', 'max:255'],
            'kategori'   => ['required', 'string', 'max:255'],
            'percent'    => ['required', 'integer', 'min:0', 'max:100'],
        ]);

        if ($request->hasFile('icon_tools')) {
            Storage::disk('public')->delete($tool->icon_tools);
            $data['icon_tools'] = $request->file('icon_tools')->store('tools', 'public');
        } else {
            unset($data['icon_tools']);
        }

        $tool->update($data);

        return redirect()->route('admin.tools.index')
            ->with('success', 'Tools berhasil diperbarui.');
    }

    public function destroy(Tools $tool)
    {
        Storage::disk('public')->delete($tool->icon_tools);
        $tool->delete();

        return redirect()->route('admin.tools.index')
            ->with('success', 'Tools berhasil dihapus.');
    }
}