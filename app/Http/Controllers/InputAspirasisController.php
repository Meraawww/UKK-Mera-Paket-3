<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InputAspirasi;
use App\Models\Siswa;
use App\Models\Kategori;
use App\Http\Requests\Storeinput_aspirasisRequest;

class InputAspirasisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inputAspirasis = InputAspirasi::with(['siswa','kategori'])->get();
        return view('input_aspirasi.index', compact('inputAspirasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        $siswas = Siswa::all();
        return view('input_aspirasi.create', compact('kategoris', 'siswas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storeinput_aspirasisRequest $request)
    {
        InputAspirasi::create($request->validated());

        return redirect()->route('input_aspirasi.index')
                         ->with('success','Aspirasi berhasil dikirim');
    }

    /**
     * Display the specified resource.
     */
    public function show($nis)
    {
         $aspirasi = InputAspirasi::where('nis',$nis)
                                 ->with(['kategori','aspirasi'])
                                 ->get();

        return view('input_aspirasi.histori', compact('aspirasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(input_aspirasis $input_aspirasis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateinput_aspirasisRequest $request, input_aspirasis $input_aspirasis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $aspirasi = InputAspirasi::findOrFail($id);
        $aspirasi->delete();

        return redirect()->route('input_aspirasi.index')
                         ->with('success','Aspirasi berhasil dihapus');
    }
}
