<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'user_id'];

    /**
     * Get the user that owns a message
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
