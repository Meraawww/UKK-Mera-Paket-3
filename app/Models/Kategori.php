<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';
    protected $primaryKey = 'id_kategori';
    protected $fillable = ['ket_kategori'];

    public function aspirasis()
    {
        return $this->hasMany(Aspirasi::class, 'id_kategori', 'id_kategori');
    }

    public function inputAspirasis()
    {
        return $this->hasMany(InputAspirasi::class, 'id_kategori', 'id_kategori');
    }

    public static function pilihKategori(int $id)
    {
        return static::find($id);
    }

    public static function tampilKategori(int $id)
    {
        return static::find($id);
    }

    public static function listKategori()
    {
        return static::all();
    }

    public static function tambahKategori(array $data)
    {
        return static::create($data);
    }
}
