<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commercial extends Model
{
    use HasFactory;
    protected $primarykey = 'commercial_id';
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'tel',
        'adress',
        'password'
    ];
}
