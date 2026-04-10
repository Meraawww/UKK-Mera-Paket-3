<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Http\Requests\StorekategorisRequest;

class KategorisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategori.index', compact('kategoris'));
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
    public function store(StorekategorisRequest $request)
    {
        Kategori::create($request->validated());
        return redirect()->back()->with('success','Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(kategoris $kategoris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategoris $kategoris)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatekategorisRequest $request, kategoris $kategoris)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategoris $kategoris)
    {
        //
    }
}
