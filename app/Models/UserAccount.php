<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UserAccount extends Model
{
    protected $table = 'user_account';

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'follower', 'id');
    }

    public function insAccount($name, $number)
    {
        $today = Carbon::now()->toDateString();
        $row = $this->where([
            ['username', $name],
            ['user_number', $number]
        ])
        ->whereDate('created_at', $today)
        ->get();
        if (count($row) == 0) {
            $this->insert([
                'username' => $name,
                'user_number' => $number,
                'visit' => $today,
                'created_at' => Carbon::now()->toDateTimeString()
                ]);
            return true;
        } else {
            return false;
        }
    }

    public function updateFollow($follower, $userAccountId, $state)
    {
        return $this->where('id', $userAccountId)
        ->update([
            'follow' => $state,
            'follower' => $follower,
            'follow_date' => Carbon::now()->toDateString()
            ]);
    }

    public function searchWord($word)
    {
        return $this->where('user_number', 'like', '%'.$word)
        ->orWhere('username', 'like', '%'.$word.'%')
        ->get();
    }

    public function getUserAccountForId($id)
    {
        return $this->find($id);
    }
}
