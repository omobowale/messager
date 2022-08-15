<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    CONST ACTIVE = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone_number'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /** 
     * Get all the messages of a particular user 
    */
    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function isAdmin(){
        return Auth::user()->is_admin == 1;
    }

    public function getUserStatus() {
        return $this->is_active == self::ACTIVE ? "Active" : "Pending";
    }

    public function getStatusColor() {
        return $this->is_active == self::ACTIVE ? "success" : "warning";
    }
    public function isActive() {
        return $this->is_active == self::ACTIVE;
    }
    
}
