<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable=[
      'user_id','corporator_id','ticket_id','title','priority','message','status'
    ];

    public function corporator() {
      return $this->belongsTo(Corporator::class);
    }

    public function user() {
      return $this->belongsTo(User::class);
    }
}
