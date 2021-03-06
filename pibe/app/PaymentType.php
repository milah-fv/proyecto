<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    protected $table = 'payment_types';

    protected $fillable = ['id', 'name', 'actived'];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
