<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use App\Models\Aspirasi;

class Admin extends Authenticatable
{
    protected $fillable = ['username', 'password'];

    public static function login(array $credentials)
    {
        return Auth::guard('admin')->attempt($credentials);
    }

    public static function logout(): void
    {
        Auth::guard('admin')->logout();
    }

    public function kelolaAspirasi()
    {
        return Aspirasi::with('kategori')->paginate(10);
    }

    public function lihatAspirasi(int $id)
    {
        return Aspirasi::with('kategori')->find($id);
    }

    public function updateStatus(Aspirasi $aspirasi, string $status)
    {
        return $aspirasi->updateStatus($status);
    }

    public function beriFeedback(Aspirasi $aspirasi, string $feedback)
    {
        return $aspirasi->beriFeedback($feedback);
    }
}
