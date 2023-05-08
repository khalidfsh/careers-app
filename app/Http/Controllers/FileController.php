<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display the specified file.
     *
     * @param  int  $userId
     * @param  string  $path
     * @return \Illuminate\Http\Response
     */
    public function show($userId, $path)
    {
        // Check if the authenticated user is the owner of the file or an admin
        if (auth()->id() != $userId) {
            abort_if(Gate::denies('view_documents'), 403);
        }

        // Check if the file exists
        $filePath = "user_{$userId}/{$path}";
        if (!Storage::disk('private_uploads')->exists($filePath)) {
            abort(404);
        }

        // Get the file and set the proper response headers
        $file = Storage::disk('private_uploads')->get($filePath);
        $mimeType = Storage::disk('private_uploads')->mimeType($filePath);
        $fileName = basename($filePath);

        return response($file)
            ->header('Content-Type', $mimeType)
            ->header('Content-Disposition', "inline; filename=\"{$fileName}\"");
    }
}
