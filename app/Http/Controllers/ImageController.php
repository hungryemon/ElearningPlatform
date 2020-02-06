<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function courseImage($imageName){
        $imageName = 'courses/' . $imageName;
        $file = Storage::get($imageName);
        return new Response($file, 200);
    }
}
