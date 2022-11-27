<?php

namespace App\Models;

use App\Traits\StoragePathTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteFile extends Model
{
    use HasFactory, StoragePathTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'url',
    ];

    public function cours()
    {
        return $this->belongsTo(ProfesseurCours::class, 'professeur_cours_id');
    }
}
