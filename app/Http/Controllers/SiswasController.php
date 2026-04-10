<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirasi;
use App\Models\InputAspirasi;
use App\Models\Kategori;
use App\Models\Siswa;
use App\Http\Requests\StoresiswasRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SiswasController extends Controller
{
    /**
     * Siswa login page
     */
    public function login(Request $request)
    {
        if ($request->method() === 'POST') {
            $credentials = $request->validate([
                'nis' => 'required|string',
                'password' => 'required|string',
            ]);

            if (Auth::guard('siswa')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('siswa.dashboard')->with('success', 'Login berhasil!');
            }

            return back()->withErrors([
                'nis' => 'NIS atau password salah.',
            ])->onlyInput('nis');
        }

        return view('auth.siswa-login');
    }

    /**
     * Siswa dashboard
     */
    public function dashboard()
    {
        $siswa = Auth::guard('siswa')->user();
        $aspirasi = InputAspirasi::where('nis', $siswa->nis)->with('aspirasi')->orderByDesc('created_at')->get();
        $categories = Kategori::all();
        $totalAspirasi = $aspirasi->count();
        $resolvedCount = $aspirasi->filter(function ($item) {
            return $item->aspirasi && $item->aspirasi->status === 'selesai';
        })->count();
        $latestAspirasi = $aspirasi->first();

        return view('siswa.dashboard', compact(
            'siswa',
            'aspirasi',
            'categories',
            'totalAspirasi',
            'resolvedCount',
            'latestAspirasi'
        ));
    }

    public function storeAspirasi(Request $request)
    {
        $siswa = Auth::guard('siswa')->user();

        $validated = $request->validate([
            'id_kategori' => 'required|exists:kategoris,id_kategori',
            'lokasi' => 'required|string|max:50',
            'ket' => 'required|string',
            'foto_pendukung' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto_pendukung')) {
            $fotoPath = $request->file('foto_pendukung')->store('aspirasi', 'public');
        }

        $input = InputAspirasi::create([
            'nis' => $siswa->nis,
            'id_kategori' => $validated['id_kategori'],
            'lokasi' => $validated['lokasi'],
            'ket' => $validated['ket'],
            'foto_pendukung' => $fotoPath,
        ]);

        Aspirasi::updateOrCreate(
            ['id_aspirasi' => $input->id_pelaporan],
            [
                'id_kategori' => $validated['id_kategori'],
                'status' => 'menunggu',
                'feedback' => null,
            ]
        );

        return redirect()->route('siswa.dashboard')->with('success', 'Aspirasi berhasil dikirim.');
    }

    /**
     * Siswa logout
     */
    public function logout(Request $request)
    {
        Auth::guard('siswa')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Logout berhasil!');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoresiswasRequest $request)
    {
        Siswa::create($request->validated());
        return redirect()->back()->with('success','Siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($nis)
    {
        $siswa = Auth::guard('siswa')->user();

        if ($siswa->nis !== $nis) {
            abort(403);
        }

        $aspirasi = InputAspirasi::where('nis', $siswa->nis)
            ->with(['kategori', 'aspirasi'])
            ->orderByDesc('created_at')
            ->get();

        return view('siswa.histori', compact('aspirasi'));
    }

    /**
     * Halaman status penyelesaian siswa.
     */
    public function statusPenyelesaian()
    {
        $siswa = Auth::guard('siswa')->user();
        $aspirasi = InputAspirasi::where('nis', $siswa->nis)
            ->with(['kategori', 'aspirasi'])
            ->orderByDesc('created_at')
            ->get();

        $statusCards = $aspirasi->take(3)->map(function ($item) {
            $status = optional($item->aspirasi)->status ?? 'menunggu';
            $feedback = optional($item->aspirasi)->feedback;

            if (!$feedback) {
                $feedback = match ($status) {
                    'proses' => 'Tim sarpras sedang mengecek ketersediaan material dan menjadwalkan perbaikan.',
                    'selesai' => 'Perbaikan telah selesai dikerjakan dan fasilitas sudah dapat digunakan kembali.',
                    default => 'Laporan telah diterima dan menunggu proses verifikasi dari admin sekolah.',
                };
            }

            return (object) [
                'title' => $item->kategori->ket_kategori ?? 'Aspirasi Siswa',
                'description' => Str::limit($item->ket, 74),
                'date' => strtoupper($item->created_at->format('d M Y')),
                'status' => $status,
                'progress' => match ($status) {
                    'proses' => 2,
                    'selesai' => 3,
                    default => 1,
                },
                'feedback' => $feedback,
                'lokasi' => $item->lokasi,
            ];
        });

        return view('siswa.status', [
            'siswa' => $siswa,
            'statusCards' => $statusCards,
            'totalAspirasi' => $aspirasi->count(),
            'processCount' => $aspirasi->filter(fn ($item) => optional($item->aspirasi)->status === 'proses')->count(),
            'resolvedCount' => $aspirasi->filter(fn ($item) => optional($item->aspirasi)->status === 'selesai')->count(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(siswas $siswas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatesiswasRequest $request, siswas $siswas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(siswas $siswas)
    {
        //
    }
}
