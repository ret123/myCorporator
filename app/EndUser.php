<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EndUser extends Model
{
    public $table = 'end_users';

    protected $guarded = ['pin'];

    protected $fillable= [
      'name','email','phone','address','verified','pin','otp_count',
    ];

    public function tickets() {
      return $this->hasMany(Ticket::class);
    }
    public function tokens()
    {
        return $this->hasMany(Token::class);
    }


    public function sendOTP() {
    $nexmo = app('Nexmo\Client');
    $message = $nexmo->message()->send([
        'to' => $this->phone,
        'from' => '@leggetter',
        'text' => 'Your OTP is '.$this->pin
    ]);
  }


}
