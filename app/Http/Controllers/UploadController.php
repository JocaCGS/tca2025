<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Models\Image;

class UploadController extends Controller
{

    public function index() {
        $images = Image::all();
        return view('home', compact('images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'title' => 'required',
            'tag'   => 'nullable|string'
        ]);

        // Save image to storage
        $path = $request->file('image')->store('images', 'public');

        Image::create([
            'title'   => $request->title,
            'tag'     => $request->tag,
            'image'   => $path,
            'user_id' => auth()->id(), // IMPORTANT
        ]);

        return redirect()->route('home')->with('success', 'Uploaded!');
    }
}
