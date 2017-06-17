<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
  protected $fillable = [
      'name', 'reply', 'status','corporator_id','ticket_id',
  ];

  public function corporator() {
    return $this->belongsTo(Corporator::class);
  }
  public function tickets() {
    return $this->hasMany(Ticket::class);
  }

  public function ticket() {
    return $this->hasOne(Ticket::class);
  }

}
