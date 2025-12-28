<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // protected $table = 'customers'; //standard
    // protected $primaryKey = 'id'; //standard
    protected $fillable = ['name', 'email', 'phone'];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
