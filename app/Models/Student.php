<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'matricule',
    ];
    
    /**
     * Get the post that owns the comment.
     */
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    /**
     * Get the user that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user that owns the comment.
     */
    public function getTps()
    {
        return Tp::whereHas('cours', function (Builder $query) {
            $query->where('classe_id', $this->classe->id);
        })->get();  
    }

    /**
     * The roles that belong to the user.
     */
    public function tps()
    {
        return $this->belongsToMany(Tp::class)
                    ->withPivot('date_soumission')
                    ->using(StudentTp::class)
                    ->withTimestamps();
    }

    public function claims()
    {
        return $this->hasMany(Claim::class);
    }
}
