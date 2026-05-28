<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model// liên hệ
{
    protected $fillable = ['full_name', 'phone_number', 'email', 'message', 'isReply'];

    // Ép kiểu isReply thành boolean (true/false) cho dễ check điều kiện (vd: if($contact->isReply))
    protected $casts = [
        'isReply' => 'boolean',
    ];
}