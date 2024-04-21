<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactte extends Model
{
    use HasFactory;
    protected $primarykey = 'contact_id';
    public function client(){
        return $this->belongsTo(Client::class,'client_id');
    }
}
