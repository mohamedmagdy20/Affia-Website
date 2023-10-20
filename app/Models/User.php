<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'url',
        'phone',
        'date_open',
        'date_close',
        'description',
        'lat',
        'lng',
        'media',
        'entity_id',
        'category_id',
        'city_id',
        'country_id',
        'registeration_num',
        'address',
        'user_type',
        'image',
        'otp',
        'is_verified',
        'slug'
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

    public function scopeUser($query)
    {
        $query->where('user_type','user');
    }

    public function scopeProvider($query)
    {
        $query->where('user_type','provider');
    }
    
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    
    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }

    
    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }

    public function entity()
    {
        return $this->belongsTo(Entity::class,'entity_id');
    }

    public function services()
    {
        return $this->hasMany(Services::class,'user_id');
    }
}
