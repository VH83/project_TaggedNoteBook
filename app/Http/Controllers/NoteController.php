<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::with('tag')->get();
        return view('note.index', [
            'notes' => $notes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('note.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $file = $request->file('coverPhoto');
        
        $extension = $file->extension();
        
        $randomName = Str::random(30);
        
        $coverPhoto = $randomName . '.' . $extension;
    
        $file->storeAs('public', $coverPhoto);
    
        $title = $request['title'];
        $description = $request['description'];
    
        $titleWords = explode(' ', $title);
        $descriptionWords = explode(' ', $description);
    
        $commonWords = array_unique(array_intersect($titleWords, $descriptionWords));

    
        $tag = Tag::create([
            'keyword' => implode(', ', $commonWords),
            'tag' => implode(', ', $commonWords),
        ]);
    
        $tagID = $tag->id;
        $note = Note::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'coverPhoto' => $coverPhoto,
            'tag_id' => $tagID,
        ]);
    
        return redirect()->route('index')->with('success', 'Note added successfully');
    }

    public function filterByTag(Request $request)
    {
        $tagKeyword = $request->input('search');
        
        $tags = Tag::where('tag', 'LIKE', '%' . $tagKeyword . '%')
                    ->get();
                    
        if ($tags->isEmpty()) {
            return redirect()->back()->with('error', 'Tag not found');
        }
    
        $tagIds = $tags->pluck('id');
    
        $filteredNotes = Note::whereIn('tag_id', $tagIds)->get();
    
        return view('note.index', [
            'notes' => $filteredNotes
        ]);
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        return view('note.edit',[
            'note' => $note
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $note->title = $request->input('title');
        $note->description = $request->input('description');

        if ($request->hasFile('coverPhoto')) {
            $coverPhotoPath = $request->file('coverPhoto')->store('cover_photos', 'public');
            $note->coverPhoto = $coverPhotoPath;
        }

        $note->save();

        return redirect()->route('index')->with('success', 'Note updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('index')->with('success', 'note deleted successfully');
    }
}
