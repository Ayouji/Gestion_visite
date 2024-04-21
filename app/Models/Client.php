<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;
    protected $primarykey = 'client_id';
    public function visites():HasMany
    {
        return $this->hasMany(Visitte::class);
    }
    public function contactte():HasMany
    {
        return $this->hasMany(Contactte::class);
    }
}
