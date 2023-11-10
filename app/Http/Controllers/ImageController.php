<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function media()
    {
        $images = Image::all();
        return view('media.index', [
            'images' => $images,
            'active' => 'galery'
        ]);
    }
    public function deleteFile($fileId)
    {
        $file = Image::find($fileId);
        if ($file) {
            if (file_exists(public_path('media/' . $file->image))) {
                unlink(public_path('media/' . $file->image));
            }
            $file->delete();
            return redirect('/myimage')->with('success', 'post has been deleted!');
        } else {
            return 'File tidak ditemukan';
        }
    }
}
