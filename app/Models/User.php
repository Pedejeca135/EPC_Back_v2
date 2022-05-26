<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
         'password',
         'remember_token',
         'role'
     ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
      protected $casts = [
          'email_verified_at' => 'datetime',
      ];

    
     // public $timestamps = false;


    public function profile(){
        //$profile = Profile::where('user_id', $this->id)->first();

        // return $this->hasOne(Profile::class);
        return $this->hasOne('App\Models\Users\Profile');

        //EJEMPLO:
        /*
        $profile = Profile::where('foreign_key', $this->local_key)->first();
         return $this->hasOne('App\Models\Users\Profile', 'foreign_key', 'local_key');
        */
    }
}
