<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];
    /**
     * Get ecus for this class
     */
    public function ecus()
    {
        return $this->hasMany(Ecu::class);
    }

    /**
     * Get the comments for the blog post.
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
