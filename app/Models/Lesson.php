<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    
protected $fillable = [
        'module_id',
        'title',
        'video_url',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

public function module()
{
    return $this->belongsTo(Module::class);
}


}
