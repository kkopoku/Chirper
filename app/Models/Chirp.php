<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chirp extends Model
{
    use HasFactory;
    use UUID;

    protected $fillable = [
        'message',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
