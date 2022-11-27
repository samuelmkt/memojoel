<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Professeur extends Model
{
    use HasFactory;
    /**
     * Get the user that owns the teacher.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * The courses that belong to the teacher.
     */
    public function cours()
    {
        return $this->belongsToMany(Classe::class)->withPivot('ecu_id')->using(ProfesseurCours::class);
    }

    public function getCoursesNames()
    {
        return Ecu::whereHas('cours', function ($query) {
            $query->where('professeur_id', $this->id);
        })->get();
    }

    public function getTps()
    {
        return Tp::whereHas('cours', function (Builder $query) {
            $query->where('professeur_id', $this->id);
        })->get();  
    }

    public function getNoteFiles()
    {
        return NoteFile::whereHas('cours', function (Builder $query) {
            $query->where('professeur_id', $this->id);
        })->get(); 
    }
}
