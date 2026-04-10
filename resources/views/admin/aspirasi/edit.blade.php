@extends('layouts.admin')

@section('title', 'Edit Aspirasi - Admin Dashboard')

@push('styles')
<style>
    .form-container {
        background: white;
        border-radius: 8px;
        border: 1px solid #e0e6ed;
        padding: 30px;
        max-width: 600px;
        margin: 0 auto;
    }

    .form-header {
        margin-bottom: 30px;
    }

    .form-title {
        font-size: 20px;
        font-weight: 600;
        color: #2d3436;
        margin-bottom: 5px;
    }

    .form-subtitle {
        font-size: 13px;
        color: #6c7d92;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        font-size: 13px;
        color: #2d3436;
    }

    .form-control {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #e0e6ed;
        border-radius: 6px;
        font-size: 13px;
        font-family: inherit;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: #0052cc;
        box-shadow: 0 0 0 3px rgba(0, 82, 204, 0.1);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }

    .form-actions {
        display: flex;
        gap: 10px;
        margin-top: 30px;
    }

    .btn {
        padding: 10px 20px;
        border-radius: 6px;
        border: none;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background-color: #0052cc;
        color: white;
        flex: 1;
    }

    .btn-primary:hover {
        background-color: #003ba3;
    }

    .btn-secondary {
        background-color: #e5e7eb;
        color: #2d3436;
        flex: 1;
    }

    .btn-secondary:hover {
        background-color: #d1d5db;
        text-decoration: none;
        color: #2d3436;
    }

    .alert-danger {
        background-color: #fee;
        color: #c33;
        padding: 12px 16px;
        border-radius: 6px;
        margin-bottom: 20px;
        border: 1px solid #fcc;
    }

    .alert-danger ul {
        margin-bottom: 0;
        padding-left: 20px;
    }

    .alert-danger li {
        font-size: 12px;
    }

    .form-info {
        background-color: #f0f4f9;
        padding: 12px 16px;
        border-radius: 6px;
        margin-bottom: 20px;
        font-size: 12px;
        color: #6c7d92;
    }
</style>
@endpush

@section('content')
<div class="form-container">
    <div class="form-header">
        <h2 class="form-title">Edit Aspirasi</h2>
        <p class="form-subtitle">Perbarui informasi aspirasi di bawah ini</p>
    </div>

    <div class="form-info">
        <strong>ID Aspirasi:</strong> #{{ $aspirasi->id_aspirasi }} |
        <strong>Dibuat:</strong> {{ $aspirasi->created_at->format('d M Y H:i') }}
    </div>

    @if($aspirasi->inputAspirasi && $aspirasi->inputAspirasi->foto_pendukung)
        <div class="form-group">
            <label class="form-label">Foto Pendukung</label>
            <img src="{{ asset('storage/'.$aspirasi->inputAspirasi->foto_pendukung) }}" alt="Foto Pendukung" style="width:100%; max-width:420px; border-radius:12px; border:1px solid #e0e6ed;" />
        </div>
    @endif

    @if($errors->any())
        <div class="alert-danger">
            <strong>Oops! Ada kesalahan:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.aspirasi.update', $aspirasi) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label" for="id_kategori">Kategori <span style="color: #dc2626;">*</span></label>
            <select id="id_kategori" name="id_kategori" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id_kategori }}" @if($aspirasi->id_kategori == $kategori->id_kategori) selected @endif>
                        {{ $kategori->ket_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="form-label" for="status">Status <span style="color: #dc2626;">*</span></label>
            <select id="status" name="status" class="form-control" required>
                <option value="">-- Pilih Status --</option>
                <option value="menunggu" @if($aspirasi->status == 'menunggu') selected @endif>Menunggu</option>
                <option value="proses" @if($aspirasi->status == 'proses') selected @endif>Dalam Proses</option>
                <option value="selesai" @if($aspirasi->status == 'selesai') selected @endif>Selesai</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label" for="feedback">Feedback / Catatan</label>
            <textarea id="feedback" name="feedback" class="form-control" placeholder="Tambahkan catatan atau feedback untuk aspirasi ini...">{{ $aspirasi->feedback }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Perbarui Aspirasi
            </button>
            <a href="{{ route('admin.aspirasi.index') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Batal
            </a>
        </div>
    </form>
</div>
@endsection
