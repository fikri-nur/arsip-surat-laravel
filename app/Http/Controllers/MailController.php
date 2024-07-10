<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Mail;
use App\Http\Requests\StoreMailRequest;
use App\Http\Requests\UpdateMailRequest;
use App\Models\MailCategory;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mails = Mail::all();
        return view('admin.pages.surat.index', compact('mails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = MailCategory::all();
        return view('admin.pages.surat.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMailRequest $request)
    {
        $validatedData = $request->validated();

        $code = $validatedData['code'];

        $directoryCode = str_replace('/', '-', $code);

        $directoryPath  = 'public/surat/' . $directoryCode;

        $file = $request->file('file');
        $randomFileName = $directoryCode . '-' . uniqid() . '.' . $file->extension();

        $filePath = $file->storeAs($directoryPath, $randomFileName);

        $databaseFilePath = str_replace('public/', '', $filePath);

        Mail::create([
            'code' => $validatedData['code'],
            'category_id' => $validatedData['category_id'],
            'title' => $validatedData['title'],
            'file_path' => $databaseFilePath,
        ]);

        return redirect()->route('surat.index')->with('success', 'Arsip surat berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mail $surat)
    {
        return view('admin.pages.surat.show', compact('surat'));
    }
    
    public function download(Mail $surat)
    {
        $filePath = public_path('storage/' . $surat->file_path);
        return response()->download($filePath, $surat->title . '.pdf');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mail $surat)
    {
        $categories = MailCategory::all();
        return view('admin.pages.surat.edit', compact('surat', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMailRequest $request, Mail $surat)
    {
        $validatedData = $request->validated();

        if ($validatedData['code'] !== $surat->code) {
            $oldDirectoryCode = str_replace('/', '-', $surat->code);
            $oldDirectoryPath = 'public/surat/' . $oldDirectoryCode;

            $newDirectoryCode = str_replace('/', '-', $validatedData['code']);
            $newDirectoryPath = 'public/surat/' . $newDirectoryCode;

            if ($request->file('file') === null) {
                $oldFilePath = 'public/' . $surat->file_path;
                $randomFileName = $newDirectoryCode . '-' . uniqid() . '.' . pathinfo($oldFilePath, PATHINFO_EXTENSION);
                $newFilePath = $newDirectoryPath . '/' . $randomFileName;
                Storage::move($oldFilePath, $newFilePath);

                $databaseFilePath = str_replace('public/', '', $newFilePath);
                $surat->update([
                    'code' => $validatedData['code'],
                    'category_id' => $validatedData['category_id'],
                    'title' => $validatedData['title'],
                    'file_path' => $databaseFilePath,
                ]);
            } else {
                $oldFilePath = 'public/' . $surat->file_path;
                if (Storage::exists($oldFilePath)) {
                    Storage::delete($oldFilePath);
                }

                $file = $request->file('file');
                $randomFileName = $newDirectoryCode . '-' . uniqid() . '.' . $file->extension();
                $newFilePath = $newDirectoryPath . '/' . $randomFileName;
                $filePath = $file->storeAs($newDirectoryPath, $randomFileName);

                $databaseFilePath = str_replace('public/', '', $filePath);

                $surat->update([
                    'code' => $validatedData['code'],
                    'category_id' => $validatedData['category_id'],
                    'title' => $validatedData['title'],
                    'file_path' => $databaseFilePath,
                ]);
            }

            if (count(Storage::files($oldDirectoryPath)) == 0) {
                Storage::deleteDirectory($oldDirectoryPath);
            }
        } else {
            if ($request->file('file') !== null) {
                $oldFilePath = 'public/' . $surat->file_path;
                if (Storage::exists($oldFilePath)) {
                    Storage::delete($oldFilePath);
                }

                $directoryCode = str_replace('/', '-', $validatedData['code']);
                $directoryPath = 'public/surat/' . $directoryCode;

                $file = $request->file('file');
                $randomFileName = $directoryCode . '-' . uniqid() . '.' . $file->extension();
                $filePath = $file->storeAs($directoryPath, $randomFileName);

                $databaseFilePath = str_replace('public/', '', $filePath);

                $surat->update([
                    'code' => $validatedData['code'],
                    'category_id' => $validatedData['category_id'],
                    'title' => $validatedData['title'],
                    'file_path' => $databaseFilePath,
                ]);
            } else {
                $surat->update([
                    'code' => $validatedData['code'],
                    'category_id' => $validatedData['category_id'],
                    'title' => $validatedData['title'],
                ]);
            }
        }

        return redirect()->route('surat.index')->with('success', 'Surat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mail $surat)
    {
        $filePath = 'public/' . $surat->file_path;
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }

        $directoryPath = dirname($filePath);
        if (Storage::exists($directoryPath) && count(Storage::files($directoryPath)) == 0) {
            Storage::deleteDirectory($directoryPath);
        }

        $surat->delete();

        return redirect()->route('surat.index')->with('danger', 'Surat berhasil dihapus.');
    }
}
