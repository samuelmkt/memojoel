<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfesseurRequest;
use App\Http\Requests\UpdateProfesseurRequest;
use App\Imports\ProfesseursImport;
use App\Models\Professeur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\User;
use App\Models\Ecu;
use App\Models\Classe;
use App\Models\ProfesseurCours;
use App\Models\Tp;
use App\Notifications\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class ProfesseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professeurs = Professeur::has('user')->get();
        
        return view('professeurs.index', ['professeurs' => $professeurs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $classes = Classe::all();
        return view('professeurs.create', ['classes' => $classes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfesseurRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfesseurRequest $request)
    {
        DB::transaction(function () use ($request) {
            $request->validate([
                'name'  => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
            
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make('M:<i|-3w):J[$')
                // 'password' => Hash::make(shell_exec('pwgen -sy 13 1')),
            ]);

            $professeur = new Professeur;
            $user->assignRole('Teacher');

            $user->professeur()->save($professeur);

            foreach ($request->cours as $cours) {
                $ecu = Ecu::find($cours);

                if (ProfesseurCours::all()->contains('ecu_id', $cours)) {
                    ProfesseurCours::where('ecu_id', $cours)->first()->update(['professeur_id' => $professeur->id]);
                } else {
                    $user->professeur->cours()->attach($ecu->classe->id, ['ecu_id' => $ecu->code_mat]);
                }

            }
            try {
                Password::sendResetLink(
                    ['email' => $user->email]
                );
            } catch (\Throwable $th) {
                //
            }
        });
        return redirect()->route('professeurs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Professeur  $professeur
     * @return \Illuminate\Http\Response
     */
    public function show(Professeur $professeur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Professeur  $professeur
     * @return \Illuminate\Http\Response
     */
    public function edit(Professeur $professeur)
    {
        $portals = [
            'professeur' => $professeur, 
            'classes'    => Classe::all(),
            'cours'      => $professeur->getCoursesNames()
        ];
         
        return view('professeurs.edit', $portals);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfesseurRequest  $request
     * @param  \App\Models\Professeur  $professeur
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfesseurRequest $request, Professeur $professeur)
    {
        $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',  Rule::unique('users')->ignore($professeur->user->id)],
        ]);

        $user = $professeur->user;
        $user->update($request->toArray());

        foreach ($request->cours as $cours) {
            $ecu = Ecu::find($cours);

            if (!$professeur->getCoursesNames()->contains('code_mat', $cours)) {
                if (ProfesseurCours::all()->contains('ecu_id', $cours)) {
                    ProfesseurCours::where('ecu_id', $cours)->first()->update(['professeur_id' => $professeur->id]);
                } else {
                    $user->professeur->cours()->attach($ecu->classe->id, ['ecu_id' => $ecu->code_mat]);
                }
            }
        }

        try {
            $status = Password::sendResetLink(
                ['email' => $user->email]
            );

            $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
        } catch (\Throwable $th) {

        }
        
        return redirect()->route('professeurs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Professeur  $professeur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professeur $professeur)
    {
        $professeur->user->delete();
        $professeur->delete();
        return redirect()->back();
    }

    public function imports(Request $request)
    {
        // try {
            Excel::import(new ProfesseursImport, $request->file('listing'));
            return redirect()->route('professeurs.index');
        // } catch (\Throwable $th) {
        //     return redirect()->route('imports.professeurs')
        //         ->withErrors('failed to imports');
        // }
    }
    
    public function resultatsTp(Tp $tp)
    {
        // return $tp->resultatsTp;
        return view('students.tps.resultats.index', ['tps' => $tp->resultatsTp]);
    }
}
