<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producten extends Model
{
    protected $fillable = ['imagepath', 'title', 'description', 'price'];

    public function categories()
    {
        return $this->belongsToMany('App\category');
    }
}
