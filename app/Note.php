<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['text'];
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
