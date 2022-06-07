<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadFile
{
    public function store(UploadedFile $file, string $path): string
    {
        $uuid = session('tenant')['id'];

        return $file->store($uuid.'/'.$path);
    }

    public function storeAs(UploadedFile $file, string $path, string $customName): string
    {
        $uuid = session('tenant')['id'];

        return $file->storeAs($uuid.'/'.$path, $customName);
    }

    public function removeFile(string $filePath): bool
    {
        if(Storage::exists($filePath))
        return Storage::delete($filePath);

        return false;
    }
}
