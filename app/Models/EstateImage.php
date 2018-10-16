<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstateImage extends Model
{
    protected $table = 'estate_image';

    public function estate()
    {
        return $this->belongsTo('App\Models\Estate', 'estate_id', 'id');
    }
}
