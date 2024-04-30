<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Visitte extends Model
{
    use HasFactory;
    //protected $primarykey = 'visite_id';
    protected $fillable = [
        'client_id',
        'contact_id',
        'admin_id',
        'objectif',
        'date_start',
        'type_visite',
        'date_h'
    ];
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
    public function admin():BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
    public function resulte():HasMany
    {
        return $this->hasMany(Resulte::class);
    }
}
