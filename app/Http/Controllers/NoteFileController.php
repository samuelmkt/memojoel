<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteFileRequest;
use App\Http\Requests\UpdateNoteFileRequest;
use App\Models\Classe;
use App\Models\Ecu;
use App\Models\NoteFile;
use App\Models\Professeur;
use Illuminate\Support\Facades\Auth;

class NoteFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole('Teacher')) {
            $notes = $user->professeur->getNoteFiles();
        }
        elseif ($user->hasRole('Super Admin') || $user->hasPermissionTo('notes show')) {
            $notes = NoteFile::all();
        }
        elseif ($user->hasRole('Students')) {

        }
        return view('notes.index', ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classe::has('ecus')->get();
        return view('notes.create', ['classes' => $classes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNoteFileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNoteFileRequest $request)
    {
        $ecu = Ecu::find($request->ecu);
        $ecu->cours->notes()->save(
            new NoteFile($request->getNoteFilePayloads())
        );
        return redirect()->route('notes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NoteFile  $note
     * @return \Illuminate\Http\Response
     */
    public function show(NoteFile $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NoteFile  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(NoteFile $note)
    {
        return view('notes.edit', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNoteFileRequest  $request
     * @param  \App\Models\NoteFile  $note
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoteFileRequest $request, NoteFile $note)
    {
        $note->update($request->getNoteFilePayloads());
        return redirect()->route('notes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NoteFile  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(NoteFile $note)
    {
        $note->delete();
        return redirect()->back();
    }
}
