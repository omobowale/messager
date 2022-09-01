<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'deadline', 'user_id', 'category_id', 'status_id'];

    public function taskcategory() {
        return $this->belongsTo(TaskCategory::class, "category_id");
    }

    public function taskstatus() {
        return $this->belongsTo(TaskStatus::class, "status_id");
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
