<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{ 
    use HasRoles;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */public function agent()
    {
    return $this->belongsTo(User::class, 'agent_id');
    }
    
     public function messages() {
        return $this->hasMany(Message::class);
    }
    // Relasi dengan model Balance
    public function balance()
    {
        return $this->hasOne(Balance::class);
    }
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'password',
        'role',
        'profile_image',
        'address',
        'kategori_id',
        'agent_id',
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
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $attributes = [
        'kategori_id' => 0,
        'agent_id' => 0,
    ];
    public function roles()
{
    return $this->belongsToMany(Role::class);
}

public function hasRole($roleName)
{
    return $this->roles->contains('name', $roleName);
}
}
