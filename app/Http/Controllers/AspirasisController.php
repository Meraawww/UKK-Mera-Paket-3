<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Aspirasi;
use App\Http\Requests\StoreaspirasisRequest;

class AspirasisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $aspirasis = Aspirasi::with('kategori')->get();
        return view('aspirasi.index', compact('aspirasis'));
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
    public function store(StoreaspirasisRequest $request)
    {
        Aspirasi::create($request->validated());
        return redirect()->back()->with('success','Aspirasi berhasil ditambahkan');
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
    public function edit(aspirasis $aspirasis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $aspirasi = Aspirasi::findOrFail($id);
        $aspirasi->update($request->all());
        return redirect()->back()->with('success','Aspirasi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(aspirasis $aspirasis)
    {
        //
    }
}
