<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Admin extends Model
{
    use HasFactory;
    public function isAdmin()
        {
            return $this->role === 'admin'; 
        }
    protected $fillable = [
        'admin',
        'nom',
        'prenom',
        'email',
        'tel',
        'adress',
        'password'
    ];
    public function visite():HasMany
    {
        return $this->hasMany(Visitte::class);
    }
    public function resulte():HasMany
    {
        return $this->hasMany(Resulte::class);
    }
}
