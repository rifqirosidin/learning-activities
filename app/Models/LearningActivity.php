<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LearningActivity extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['activity', 'start_date','end_date','month_id', 'method_id'];

//    protected $with = ['method'];

    public function month()
    {
        return $this->belongsTo(Month::class);
    }

    public function method()
    {
        return $this->belongsTo(Method::class);
    }

}
