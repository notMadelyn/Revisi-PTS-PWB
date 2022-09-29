<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [
        'rekening',
        'money'
    ];

    public function rekening(){
        return $this->hasOne(User::class,'rekening' , 'rekening');
    }

}
