<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Method extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function learningActivities()
    {
        return $this->hasMany(LearningActivity::class);

    }

}
