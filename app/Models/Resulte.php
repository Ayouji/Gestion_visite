<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Resulte extends Model
{
    use HasFactory;
    protected $primarykey = 'result_id';
    public function admin():BelongsTo
    {
        return $this->belongsTo(Admin::class); 
    }
    public function visite(): BelongsTo
    {
        return $this->belongsTo(Visitte::class);
    }
}
