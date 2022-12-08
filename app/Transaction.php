<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];

    protected $dates = [
        'mulai',
        'selesai'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function payment()
    {
        return $this->hasOne('App\Transaction_payment', 'transaction_id');
    }
}
