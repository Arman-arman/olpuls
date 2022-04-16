<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meneger extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function client()
    {
        return $this->hasOne(Client::class);
    }
}
