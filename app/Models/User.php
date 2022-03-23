<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Junges\ACL\Traits\UsersTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, UsersTrait, SoftDeletes;

    protected $guard = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Loja(){
        { return $this->hasOne('App\Models\Lojas','id','loja_id');}
    }

    public function createUser($params)
    {
        $user = new User();

        try {
            $user->name = $params->name;
            $user->email = $params->email;
            $firstname = explode(" ", $params->name);
            $password = strtolower($firstname[0]).'@'.rand(1000,5000);
            $user->password = bcrypt($password);
            $user->loja_id = $params->loja_id;
            $user->save();
            $user->assignGroup($params->group);

            return [
                'password' => $password,
                'id' => $user->id
            ];
        } catch (\Throwable $th) {
            throw $th;
            return $th;
        }
    }
}
