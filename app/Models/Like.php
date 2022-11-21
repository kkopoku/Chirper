<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory, UUID;

    public function user(){
        $this->belongsTo(user::class);
    }

    public function chirp(){
        $this->belongsTo(chirp::class);
    }
}
