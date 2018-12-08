<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UserAccount extends Model
{
    protected $table = 'user_account';

    public function insAccount($name, $number)
    {
        $row = $this->where([
            ['username', $name],
            ['user_number', $number]
        ])->get();
        if(count($row) == 0){
            $this->insert(['username' => $name, 'user_number' => $number, 'visit' => Carbon::now()->toDateString(),'created_at' => Carbon::now()->toDateTimeString()]);
            return true;
        }else{
            return false;
        }
    }
}
