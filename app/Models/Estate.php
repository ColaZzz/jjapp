<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    public function estateImages()
    {
        return $this->hasMany('App\Models\EstateImage', 'estate_id', 'id');
    }

    public function showSelect()
    {
        return $this->pluck('title', 'id');
    }
}