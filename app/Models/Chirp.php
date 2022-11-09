<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\ChirpCreated;

class Chirp extends Model
{
    use HasFactory;
    use UUID;

    protected $fillable = [
        'message',
    ];

    // protected $dispatchesEvents = [
    //     'created' => ChirpCreated::class,
    // ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
