<?php

namespace App\Models;
use App\Models\Scholarship;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $fillable = [
        'id',
        'title', // or 'scholarship_id' if you named it that
        'description',
        'amount',
    ];
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
