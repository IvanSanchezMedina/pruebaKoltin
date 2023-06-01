<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable=[
        'sender_id',
        'receiver_id',
        'last_time_message',
        'conversation_id',
        'read',
        'body',
        'created_at',
        'type',
        'url'
    ];


    public function conversation()
    {
        return $this->belongsTo(Conversation::class);

    }

    public function useer( )
    {
        return $this->belongsTo(User::class ,'sender_id');

    }
}
