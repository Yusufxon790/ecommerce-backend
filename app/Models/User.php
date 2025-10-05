<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

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
        'phone'
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




    public function favorites()
    {
        return $this->belongsToMany(Product::class,'product_user');
    }

    public function hasFavorite($favorite_id){
        return $this->favorites()->where('product_id',$favorite_id)->exists();
    }

    public function user_addresses(){
        return $this->hasMany(UserAddress::class);
    }

    public function orders(){
       return $this->hasMany(Order::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function settings(){
        return $this->hasMany(UserSetting::class,'user_id','id');
    }

    public function photos(){
        return $this->morphMany(Photo::class,'photoable');
    }
}
