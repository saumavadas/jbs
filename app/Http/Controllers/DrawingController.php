<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DrawingController extends Controller
{
    public function saveDrawing(Request $request)
    {
        $request->validate([
            'image' => 'required'
        ]);

        // Decode Base64 Image
        $image = $request->image;
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageData = base64_decode($image);

        // Define file name and path
        $fileName = 'drawing_' . time() . '.png';
        $filePath = 'drawings/' . $fileName;

        // Save file to storage
        Storage::disk('public')->put($filePath, $imageData);

        return response()->json([
            'message' => 'Drawing saved successfully!',
            'file' => asset('storage/' . $filePath)
        ]);
    }

    public function index()
    {
        // Get all files in the drawings folder
        $files = Storage::disk('public')->files('drawings');

        // Generate URLs for each saved drawing
        $imageUrls = array_map(function ($file) {
            return asset('storage/' . $file);
        }, $files);

        return view('admin.drawings.index', compact('imageUrls'));
    }
}
