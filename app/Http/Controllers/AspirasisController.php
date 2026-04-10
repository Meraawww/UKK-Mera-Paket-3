<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Aspirasi;
use App\Models\Kategori;
use App\Http\Requests\StoreaspirasisRequest;

class AspirasisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Aspirasi::with(['kategori', 'inputAspirasi.siswa']);

        // Filter by tanggal (date)
        if ($request->filled('tanggal')) {
            $query->whereDate('created_at', $request->tanggal);
        }

        // Filter by bulan (month)
        if ($request->filled('bulan')) {
            $query->whereMonth('created_at', $request->bulan);
        }

        // Filter by kategori (category)
        if ($request->filled('kategori')) {
            $query->where('id_kategori', $request->kategori);
        }

        // Filter by siswa (student NIS or name)
        if ($request->filled('siswa')) {
            $siswaSearchTerm = $request->siswa;
            $query->whereHas('inputAspirasi', function ($subquery) use ($siswaSearchTerm) {
                $subquery->where('nis', 'like', '%' . $siswaSearchTerm . '%')
                    ->orWhereHas('siswa', function ($siswaQuery) use ($siswaSearchTerm) {
                        $siswaQuery->where('nis', 'like', '%' . $siswaSearchTerm . '%')
                            ->orWhere('nama_siswa', 'like', '%' . $siswaSearchTerm . '%');
                    });
            });
        }

        $aspirasis = $query->paginate(10)->appends($request->query());
        return view('admin.aspirasi.index', compact('aspirasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.aspirasi.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreaspirasisRequest $request)
    {
        $validated = $request->validate([
            'id_kategori' => 'required|exists:kategoris,id_kategori',
            'status' => 'required|in:menunggu,proses,selesai',
            'feedback' => 'nullable|string',
        ]);

        Aspirasi::simpanAspirasi($validated);
        return redirect()->route('admin.aspirasi.index')->with('success', 'Aspirasi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(aspirasis $aspirasis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aspirasi $aspirasi)
    {
        $kategoris = Kategori::all();
        return view('admin.aspirasi.edit', compact('aspirasi', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aspirasi $aspirasi)
    {
        $validated = $request->validate([
            'id_kategori' => 'required|exists:kategoris,id_kategori',
            'status' => 'required|in:menunggu,proses,selesai',
            'feedback' => 'nullable|string',
        ]);

        $aspirasi->update(['id_kategori' => $validated['id_kategori']]);
        $aspirasi->updateStatus($validated['status']);

        if (!empty($validated['feedback'])) {
            $aspirasi->beriFeedback($validated['feedback']);
        }

        return redirect()->route('admin.aspirasi.index')->with('success', 'Aspirasi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aspirasi $aspirasi)
    {
        $aspirasi->delete();
        return redirect()->route('admin.aspirasi.index')->with('success', 'Aspirasi berhasil dihapus!');
    }
}
