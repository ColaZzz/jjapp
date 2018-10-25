<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstateImage extends Model
{
    protected $table = 'estate_image';

    protected $fillable = [
        'estate_id', 'img_url', 'rank',
    ];

    public function estate()
    {
        return $this->belongsTo('App\Models\Estate', 'estate_id', 'id');
    }
}
