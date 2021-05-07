<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_hr',
        'name_en',
        'thesis_problem',
        'study_type',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
