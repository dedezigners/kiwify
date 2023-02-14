<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'desc', 'status'];
    protected $with = ['questions'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
