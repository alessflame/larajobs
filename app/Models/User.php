<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Cv;
use App\Models\JobAd;
use App\Models\jobApplication;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
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
        'isCompany'
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
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            "name" => $this->name,
            "email" => $this->email,
        ];
    }


    //miei

    public function jobApplications()
    {
        return $this->hasMany(jobApplication::class);
    }

    public function jobs()
    {
        return $this->hasMany(JobAd::class);
    }

    public function cv()
    {
        return $this->hasOne(Cv::class);
    }
}


// {
// "email":"fra@fra.it",
// "password":"francescofra"}


// {"job_ads_id":"4",
//     "user_id":91,
//     "cover_letter":"Ciao sono ciccio e mi candido"}
