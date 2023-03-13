<?php

namespace App\Http\Controllers;

use App\Classes\Facades\CacheComposite;
use App\Models\File;
use App\Events\FileUploadEvent;
use App\Http\Requests\FileRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $files = CacheComposite::getCacheOrCreate(
            'files',
            File::class,
            ['id', 'origin_name', 'hash_name', 'extension', 'url']
        );

        return view('files.index', compact('files'));
    }

    public function uploadFile(FileRequest $request)
    {
        if ($request->hasFile('file'))
            $file = $request->file('file');
        $hashName = $file->store('uploads');

        $file = File::create([
            'origin_name' => $request->file->getClientOriginalName(),
            'hash_name' => $hashName,
            'url' => 'storage/' . $hashName,
            'extension' => $request->file->getClientMimeType()
        ]);

        CacheComposite::updateCache(
            File::class,
            'files',
            ['id', 'origin_name', 'hash_name', 'extension', 'url']
        );

        event(new FileUploadEvent($file, auth()->user()));

        return redirect()->back();
    }

    public function downloadFile(File $file)
    {
        return Storage::download($file->hash_name, $file->name);
    }
}
