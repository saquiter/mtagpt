<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $guarded = false;

    protected $fillable = [
        'message',
        'is_bot',
        'chat_id',
        'id',
        'created_at'
    ];

    protected $casts = [
        'created_at' => 'datetime:H:i',
    ];

}
