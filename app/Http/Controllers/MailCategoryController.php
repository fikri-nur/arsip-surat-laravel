<?php

namespace App\Http\Controllers;

use App\Models\MailCategory;
use App\Http\Requests\StoreMailCategoryRequest;
use App\Http\Requests\UpdateMailCategoryRequest;

class MailCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mailCategories = MailCategory::all();
        return view('admin.pages.kategori.index', compact('mailCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMailCategoryRequest $request)
    {
        $validateData = $request->validated();

        MailCategory::create($validateData);

        return redirect()->route('kategori-surat.index')->with('success', 'Kategori surat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(MailCategory $mailCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MailCategory $kategori_surat)
    {
        return view('admin.pages.kategori.edit', compact('kategori_surat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMailCategoryRequest $request, MailCategory $kategori_surat)
    {
        $validateData = $request->validated();

        $kategori_surat->update($validateData);

        return redirect()->route('kategori-surat.index')->with('primary', 'Kategori surat berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MailCategory $kategori_surat)
    {
        $kategori_surat->delete();

        return redirect()->route('kategori-surat.index')->with('danger', 'Kategori surat berhasil dihapus');
    }
}
