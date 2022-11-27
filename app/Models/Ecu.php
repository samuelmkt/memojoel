<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecu extends Model
{
    use HasFactory;
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'code_mat';

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];
    /**
     * Get the classe that owns the ecu.
     */
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function tps()
    {
        return $this->hasMany(Tp::class);
    }

    public function notes()
    {
        return $this->hasOne(NoteFile::class);
    }

    public function cours()
    {
        return $this->hasOne(ProfesseurCours::class, 'ecu_id', 'code_mat');
    }
}
