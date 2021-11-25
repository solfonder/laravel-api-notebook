<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    protected function showImage($filename)
    {
        $exists = Storage::disk('public/uploads')->exists($filename);
        if($exists) {
            $content = Storage::get('public/uploads/'.$filename);
            $mime = Storage::mimeType('public/uploads/'.$filename);
            $response = Response::make($content, 200);
            $response->header("Content-Type", $mime);
            return $response;
        } else {
            return response(null, 404);
        }
    }
}
