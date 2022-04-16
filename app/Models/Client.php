<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'meneger_id', 'tags'
    ];

    public function meneger()
    {
        return $this->belongsTo(Meneger::class, 'meneger_id');
    }
}
