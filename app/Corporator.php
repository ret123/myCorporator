<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corporator extends Model
{
    protected $fillable= [
      'name','duration','addresss','party'
    ];

    public function ward() {
    return  $this->belongsTo('App\Ward');
    }
    public function area() {
      return $this->belongsTo('App\Area');
    }

    public function tickets() {
      return $this->hasMany(Ticket::class);
    }

    public function user() {
      return $this->belongsTo(User::class);
    }

    public function workers() {
      return $this->hasMany(Worker::class);
    }
}
