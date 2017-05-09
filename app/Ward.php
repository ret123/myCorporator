<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{

    protected $fillable=['name'];

    public function areas() {
      return $this->belongsToMany('App\Area');
    }

    public function corporators() {
      return $this->hasMany('App\Corporator');
    }

}
