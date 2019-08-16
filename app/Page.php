<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title'];

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
