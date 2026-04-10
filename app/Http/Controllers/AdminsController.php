<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Aspirasi;
use App\Models\Kategori;
use App\Models\InputAspirasi;
use App\Http\Requests\StoreadminsRequest;
use App\Http\Requests\UpdateadminsRequest;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::all();
        return view('admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreadminsRequest $request)
    {
        Admin::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Admin berhasil ditambahkan');
    }

    /**
     * Show login form
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Login admin or siswa
     */
    public function login(Request $request)
    {
        $role = $request->input('role');
        $username = $request->input('username');
        $password = $request->input('password');

        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'role' => 'required|in:admin,siswa',
        ]);

        if ($role === 'admin') {
            // Admin login dengan username
            if (Auth::guard('admin')->attempt(['username' => $username, 'password' => $password])) {
                $request->session()->regenerate();
                return redirect()->route('admin.dashboard')->with('success', 'Login berhasil sebagai Admin!');
            }

            return back()->withErrors(['username' => 'Username atau password salah'])->onlyInput('username');

        } elseif ($role === 'siswa') {
            // Siswa login dengan NIS
            if (Auth::guard('siswa')->attempt(['nis' => $username, 'password' => $password])) {
                $request->session()->regenerate();
                return redirect()->route('siswa.dashboard')->with('success', 'Login berhasil sebagai Siswa!');
            }

            return back()->withErrors(['username' => 'NIS atau password salah'])->onlyInput('username');
        }

        return back()->withErrors(['role' => 'Peran pengguna tidak valid']);
    }

    /**
     * Logout admin or siswa
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        Auth::guard('siswa')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('success', 'Logout berhasil!');
    }

    /**
     * Dashboard admin
     */
    public function dashboard()
    {
        $todayCount = InputAspirasi::countToday();
        $queueCount = Aspirasi::countByStatus('menunggu');
        $activeCount = Aspirasi::countByStatus('proses');
        $resolvedCount = Aspirasi::countByStatus('selesai');
        $kategoris = Kategori::listKategori();
        $totalAspirasi = Aspirasi::count();

        return view('admin.dashboard', compact(
            'todayCount',
            'queueCount',
            'activeCount',
            'resolvedCount',
            'kategoris',
            'totalAspirasi'
        ));
    }

    /**
     * Manage aspirasi data
     */
    public function kelolaAspirasi()
    {
        return redirect()->route('admin.aspirasi.index');
    }

    /**
     * View aspirasi details
     */
    public function lihatAspirasi(Aspirasi $aspirasi)
    {
        return view('admin.aspirasi.show', compact('aspirasi'));
    }

    /**
     * Update aspirasi status
     */
    public function updateStatus(Request $request, Aspirasi $aspirasi)
    {
        $request->validate([
            'status' => 'required|in:menunggu,proses,selesai',
            'feedback' => 'nullable|string',
        ]);

        $aspirasi->updateStatus($request->status);
        if ($request->filled('feedback')) {
            $aspirasi->beriFeedback($request->feedback);
        }

        return redirect()->route('admin.aspirasi.index')->with('success', 'Status aspirasi berhasil diperbarui');
    }

    /**
     * Give feedback for aspirasi
     */
    public function beriFeedback(Request $request, Aspirasi $aspirasi)
    {
        $request->validate([
            'feedback' => 'required|string',
        ]);

        $aspirasi->beriFeedback($request->feedback);
        return redirect()->route('admin.aspirasi.index')->with('success', 'Feedback aspirasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return view('admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateadminsRequest $request, Admin $admin)
    {
        $data = $request->validated();
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $admin->update($data);
        return redirect()->route('admin.dashboard')->with('success', 'Admin berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Admin berhasil dihapus');
    }
}
