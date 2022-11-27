<?php

namespace App\Imports;

use App\Models\Classe;
use App\Models\Ecu;
use App\Models\Professeur;
use App\Models\ProfesseurCours;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProfesseursImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            DB::transaction(function () use ($row) {
                $user = User::firstOrCreate(
                    ['email' => $row[4]],
                    ['name'  => $row[3], 'password' => Hash::make('sv2/bJPj6GY=')]
                );

                $user->assignRole('Teacher');

                $professeur = new Professeur([]);

                $ecu = Ecu::firstOrNew(
                    ['code_mat' => $row[0]],
                    ['name' => $row[2]]
                );

                isset($ecu->classe->id) ? $ecu : Classe::firstOrCreate(['name'  => $row[1]])->ecus()->save($ecu);

                $user->professeur()->save($professeur);

                if (ProfesseurCours::all()->contains('ecu_id', $ecu->code_mat)) {
                    ProfesseurCours::where('ecu_id', $ecu->code_mat)->first()->update(['professeur_id' => $professeur->id]);
                } else {
                    $user->professeur->cours()->attach($ecu->classe->id, ['ecu_id' => $ecu->code_mat]);
                }                
                try {
                    Password::sendResetLink(
                        ['email' => $user->email]
                    );                
                } catch (\Throwable $th) {
                    //
                }
            });
        }
    }
}
