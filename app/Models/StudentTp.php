<?php

namespace App\Models;

use App\Traits\StoragePathTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class StudentTp extends Pivot
{
    use StoragePathTrait;
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

    protected $table = 'student_tp';

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function tp()
    {
        return $this->belongsTo(Tp::class);
    }
}
