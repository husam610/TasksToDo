<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['text','page_id'];
    
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
