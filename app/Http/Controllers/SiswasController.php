<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InputAspirasi;
use App\Models\Siswa;
use App\Http\Requests\StoresiswasRequest;

class SiswasController extends Controller
{
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
         $aspirasi = InputAspirasi::where('nis',$nis)->with('aspirasi')->get();
        return view('siswa.histori', compact('aspirasi'));
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
