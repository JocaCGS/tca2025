<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Models\Image;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Barryvdh\DomPDF\Facade\Pdf;


class UploadController extends Controller
{

    public function index() {
        $images = Image::all();
        return view('home', compact('images'));
    }

    public function show($id)
    {
        $image = Image::findOrFail($id);
        return view('image-show', compact('image'));
    }

    public function userImages()
    {
        $userId = auth()->id();
        $images = Image::where('user_id', $userId)->get();
        return view('user-images', compact('images'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'title' => 'required',
            'tag'   => 'nullable|string'
        ]);

        // Upload para Cloudinary
        $uploadedFile = Cloudinary::upload($request->file('image')->getRealPath(), [
            'folder' => 'uploads' // pasta personalizada no cloudinary (opcional)
        ]);

        // URL da imagem externa na CDN
        $url = $uploadedFile->getSecurePath();

        Image::create([
            'title'   => $request->title,
            'tag'     => $request->tag,
            'image'   => $url, // salva URL externa
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('home')->with('success', 'Uploaded to Cloud!');
    }


    public function destroy(string $id)
    {
        $image = Image::find($id);
        
        if(isset($image)){
            $image->delete();  
        }

        return redirect()->route('userimages');
    }

    public function edit(string $id)
    {
        $image = Image::find($id);
        if(isset($image)) {
            return view('image-edit', compact('image'));
        }

        return redirect()->route('upload.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $image = image::find($id);
        if(isset($image)) {
            $image->title = $request->title;
            $image->tag = $request->tag;
            $image->save();
        }

        return redirect()->route('userimages');
    }

    

    public function search(Request $request)
    {
        $query = $request->input('search');



        // If search field is empty, return back with no results
        if (!$query) {
            return view('image-search', ['images' => collect(), 'search' => $query]);
        }

        // Search in title OR tag (case-insensitive)
        $images = Image::where('title', 'LIKE', "%{$query}%")
                        ->orWhere('tag', 'LIKE', "%{$query}%")
                        ->get();    

        return view('image-search', [
            'images' => $images,
            'search' => $query
        ]);
    }







    //PDF
    public function makepdf() {
    // Busca todas as imagens com os usuários que as enviaram
    $images = Image::with(['user'])->get();

    // Passa $images para a view
    $pdf = Pdf::loadView('imagedata-pdf', ['images' => $images]);

    $pdf = Pdf::loadView('imagedata-pdf', ['images' => $images])
          ->setOptions([
              'isRemoteEnabled' => true, // habilita URLs externas
          ]);
          
    // Exibe no navegador
    return $pdf->stream('relatorio_imagens.pdf');


    
    // Ou para forçar download:
    // return $pdf->download('relatorio_imagens.pdf');
}


}
