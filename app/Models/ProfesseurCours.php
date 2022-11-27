<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProfesseurCours extends Pivot
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $table = 'classe_professeur';

    public function tps()
    {
        return $this->hasMany(Tp::class, 'professeur_cours_id', 'id');
    }

    public function notes()
    {
        return $this->hasMany(NoteFile::class, 'professeur_cours_id', 'id');
    }

    public function ecu()
    {
        return $this->belongsTo(Ecu::class, 'ecu_id', 'code_mat');
    }

    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
