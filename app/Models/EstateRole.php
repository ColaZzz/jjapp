<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstateRole extends Model
{
    protected $table = 'estate_role';

    public function getEstateRoles()
    {
        return $this->select('linkage_name', 'linkage_role')->get();
    }
}
