<?php

namespace App\Models;

use App\Traits\StoragePathTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tp extends Model
{
    use HasFactory, StoragePathTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'deadline',
        'url'
    ];

    public function cours()
    {
        return $this->belongsTo(ProfesseurCours::class, 'professeur_cours_id');
    }

    /**
     * The roles that belong to the user.
     */
    public function resultatsTp()
    {
        return $this->belongsToMany(Student::class)
                    ->withPivot('date_soumission', 'url')
                    ->using(StudentTp::class)
                    ->withTimestamps();
    }
}
