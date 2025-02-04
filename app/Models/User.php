<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Mail\TwoFAEmailCode;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
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
        'password' => 'hashed',
    ];
    public function generateCode()
    {
        $code = rand(1000, 9999);

        UserCode::updateOrCreate(
            ['user_id' => auth()->user()->id],
            ['code' => $code]
        );

        $reszletek = [
            'title' => 'Kétlépcsős azonosítás',
            'code' => $code
        ];
        /*Az email küldési funkciót az alábbi kód érvényesítésével lehet beiktatni! Teszt fázis miatt van kivéve, de működik, tesztelve lett*/
        //Mail::to(auth()->user()->email)->send(new TwoFAEmailCode($reszletek));
    }
}