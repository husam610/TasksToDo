<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
