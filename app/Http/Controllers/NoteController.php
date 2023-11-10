<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class NoteController extends Controller
{
    public function index()
    {
        $categories = Category::where('user_id', auth()->user()->id)->get();
        $notes = Note::where('user_id', auth()->user()->id)->get();
        return view('notes.index', [
            'categories' => $categories,
            'notes' => $notes,
            'active' => 'notes'
        ]);
    }

    public function show(Note $note)
    {
        return view('notes.show', [
            'note' => $note,
            'categories' => Category::all(),
            'active' => '',
            'id' => $note->category_id

        ]);
    }

    public function create()
    {
        return view('notes.create', [
            'categories' => Category::where('user_id', auth()->user()->id)->get(),
            'active' => 'create'
        ]);
    }


    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:notes',
            'category_id' => 'required',
            'body' => 'required'
        ]);



        $validatedData['user_id'] = auth()->user()->id;
        Note::create($validatedData);

        return redirect('/notes')->with('success', 'New nnote added!');
    }

    public function uploadImage(Request $request)
    {
        // Validasi file
        $request->validate([
            'upload' => 'required|file|mimes:jpeg,png,gif|max:1024', // Sesuaikan aturan validasi sesuai kebutuhan Anda
        ]);

        if ($request->file('upload')->isValid()) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $file = new Image();
            $file->image = $fileName;
            $file->user_id = auth()->user()->id;
            $file->save();

            $url = asset('media/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        } else {
            return response()->json(['error' => 'File tidak valid.']);
        }
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Note::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function edit(Note $note)
    {
        return view('notes.edit', [
            'note' => $note,
            'categories' => Category::where('user_id', auth()->user()->id)->get(),
            'active' => 'create'
        ]);
    }

    public function update(Request $request, Note $note)
    {
        $rules = [
            'title' => 'required|max:255',
            'body' => 'required'
        ];


        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;

        Note::where('id', $note->id)
            ->update($validatedData);

        return redirect('/notes')->with('success', 'Updated is success!');
    }

    public function destroy(Note $note)
    {
        // Note::destroy($note->id);
        $note = Note::where('slug', $note->slug)->first();
        $note->delete();
        return redirect('/notes')->with('success', 'post has been deleted!');
    }
}
