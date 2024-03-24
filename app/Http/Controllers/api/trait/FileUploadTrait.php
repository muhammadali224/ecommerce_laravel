<?php

namespace App\Http\Controllers\api\trait;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

trait FileUploadTrait
{
    use ApiResponseTrait;
    public function uploadImage(Request $request, $fileName, $pathName)
    {
        $image =  $request->file($fileName)->getClientOriginalName();
        $request->file($fileName)->storeAs('images/' . $pathName, $image, 'api');
        return $image;
    }


    public function deleteFile($path, $disk = 'api')
    {
        Storage::disk($disk)->delete($path);
        
    }
}
