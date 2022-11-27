<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTpRequest;
use App\Http\Requests\UpdateTpRequest;
use App\Models\Ecu;
use App\Models\Tp;
use App\Models\Professeur;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
class TpController extends Controller
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
            $tps = $user->professeur->getTps();
        }
        elseif ($user->hasRole('Super Admin') || $user->hasPermissionTo('notes show')) {
            $tps = Tp::all();
        }
        elseif ($user->hasRole('Students')) {
            $tps = $user->student->getTps();
        }
        return view('tps.index', ['tps' => $tps]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $professeur = Auth::user()->professeur;
            return view('tps.create', 
                [
                    'classes'   => $professeur->cours->unique('id')->values()->all(),
                    'cours'     => $professeur->getCoursesNames()
                ]
            );
        } catch (\Throwable $th) {

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTpRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTpRequest $request)
    {
        $ecu = Ecu::find($request->ecu);
        $ecu->cours->tps()->save(new Tp($request->getTpPayloads()));
        return redirect()->route('tps.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tp  $tp
     * @return \Illuminate\Http\Response
     */
    public function show(Tp $tp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tp  $tp
     * @return \Illuminate\Http\Response
     */
    public function edit(Tp $tp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTpRequest  $request
     * @param  \App\Models\Tp  $tp
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTpRequest $request, Tp $tp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tp  $tp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tp $tp)
    {
        $tp->delete();
        return redirect()->back();
    }
}
