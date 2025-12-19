<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['first_name', 'middle_name','last_name', 'email', 'phone', 'address', 'school', 'course', 'disability', 'profile_picture'];

    // Define relation
    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class);
    }
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
