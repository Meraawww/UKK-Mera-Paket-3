<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    protected $table = 'aspirases';
    protected $primaryKey = 'id_aspirasi';
    protected $fillable = ['id_aspirasi','status','id_kategori','feedback'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function inputAspirasi()
    {
        return $this->belongsTo(InputAspirasi::class, 'id_aspirasi', 'id_pelaporan');
    }

    public static function simpanAspirasi(array $data)
    {
        return static::create($data);
    }

    public function updateStatus(string $status)
    {
        $this->status = $status;
        $this->save();
        return $this;
    }

    public function beriFeedback(string $feedback)
    {
        $this->feedback = $feedback;
        $this->save();
        return $this;
    }

    public function tampilkanFeedback()
    {
        return $this->feedback;
    }

    public static function countByStatus(string $status)
    {
        return static::where('status', $status)->count();
    }
}
