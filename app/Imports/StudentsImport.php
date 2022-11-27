<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\Classe;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Password;
use Maatwebsite\Excel\Concerns\ToCollection;

class StudentsImport implements ToCollection
{
    /**
    * @param array $rows
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $user = User::firstOrCreate(
                ['email' => $row[3]],
                ['name'  => $row[2], 'password' => Hash::make(shell_exec('pwgen -sy 13 1'))]
            );
            $user->assignRole('Students');
            $student = new Student(['matricule' => $row[1]]);
            $classe = Classe::where('name', $row[4])->first();
            $user->student()->save($student);
            $classe->students()->save($student);
            try {
                Password::sendResetLink(
                    ['email' => $user->email]
                );
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
    }
}
